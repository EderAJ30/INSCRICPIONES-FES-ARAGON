<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Grupo;
use App\Models\Inscripcion;
use App\Models\ComprobanteInscripcion;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PeriodoEscolar;

class InscripcionController extends Controller
{
  public function index()
  {
    $usuario = Auth::user();
    if (!$usuario || !$usuario->esAlumno()) abort(403);

    $alumno = $usuario->perfil;

    $periodoActivo = PeriodoEscolar::where('estatus_activo', 1)->first();

    if ($periodoActivo) {
      $yaInscrito = ComprobanteInscripcion::where('id_alumno', $alumno->id_alumno)
        ->where('id_periodo', $periodoActivo->id_periodo)
        ->exists();

      if ($yaInscrito) {
        return redirect()->route('perfil.index')->with('info', 'Tu inscripción para el periodo ' . $periodoActivo->nombre_periodo . ' ya fue realizada y se encuentra bloqueada.');
      }
    }

    $gruposDisponibles = Grupo::with(['asignatura', 'profesor', 'horario_grupos.aula'])
      ->where('id_periodo', $periodoActivo ? $periodoActivo->id_periodo : 0)
      ->get();

    return view('inscripciones.crear', compact('alumno', 'gruposDisponibles'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'grupos' => 'required|array|min:1|max:7',
      'grupos.*' => 'exists:Grupo,id_grupo'
    ]);

    $alumno = Auth::user()->perfil;

    $periodoActivo = PeriodoEscolar::where('estatus_activo', 1)->first();

    if (!$periodoActivo) {
      return back()->withErrors(['error' => 'No hay un periodo escolar activo configurado en el sistema.']);
    }

    $yaInscrito = ComprobanteInscripcion::where('id_alumno', $alumno->id_alumno)
      ->where('id_periodo', $periodoActivo->id_periodo)
      ->exists();

    if ($yaInscrito) {
      return redirect()->route('perfil.index')->with('info', 'Tu inscripción ya se encuentra registrada.');
    }

    $gruposSeleccionados = Grupo::with('horario_grupos')->whereIn('id_grupo', $request->grupos)->get();
    $horariosOcupados = [];

    foreach ($gruposSeleccionados as $grupo) {
      foreach ($grupo->horario_grupos as $horario) {
        foreach ($horariosOcupados as $ocupado) {
          if ($horario->dia_semana === $ocupado->dia_semana) {
            if ($horario->hora_inicio < $ocupado->hora_fin && $horario->hora_fin > $ocupado->hora_inicio) {
              return back()->withErrors(['empalme' => 'Se detectó un empalme de horarios en el servidor.'])->withInput();
            }
          }
        }
        $horariosOcupados[] = $horario;
      }
    }

    try {
      DB::beginTransaction();

      foreach ($request->grupos as $id_grupo) {
        Inscripcion::create([
          'id_alumno' => $alumno->id_alumno,
          'id_grupo' => $id_grupo,
          'estatus_inscripcion' => 'Regular'
        ]);
      }

      $comprobante = ComprobanteInscripcion::create([
        'folio_verificacion' => uniqid('FES_'),
        'id_alumno' => $alumno->id_alumno,
        'id_periodo' => $periodoActivo->id_periodo, // Enlazado al periodo activo de forma consistente
        'sello_digital' => hash('sha256', $alumno->id_alumno . time())
      ]);

      DB::commit();
      return redirect()->route('inscripciones.resumen', $comprobante->id_comprobante);
    } catch (\Exception $e) {
      DB::rollBack();
      return back()->withErrors(['error' => 'Error en la transacción: ' . $e->getMessage()]);
    }
  }

  public function resumen($id_comprobante)
  {
    $comprobante = ComprobanteInscripcion::with('alumno')->findOrFail($id_comprobante);

    if ($comprobante->id_alumno !== Auth::user()->perfil->id_alumno) abort(403);

    $inscripciones = Inscripcion::with(['grupo.asignatura', 'grupo.profesor'])
      ->where('id_alumno', $comprobante->id_alumno)
      ->whereHas('grupo', function ($query) use ($comprobante) {
        $query->where('id_periodo', $comprobante->id_periodo);
      })
      ->get()
      ->unique('id_grupo');

    return view('inscripciones.resumen', compact('comprobante', 'inscripciones'));
  }

  public function descargarComprobante($id_comprobante)
  {
    $comprobante = ComprobanteInscripcion::with('alumno')->findOrFail($id_comprobante);

    if ($comprobante->id_alumno !== Auth::user()->perfil->id_alumno) abort(403);

    $inscripciones = Inscripcion::with(['grupo.asignatura', 'grupo.profesor'])
      ->where('id_alumno', $comprobante->id_alumno)
      ->whereHas('grupo', function ($query) use ($comprobante) {
        $query->where('id_periodo', $comprobante->id_periodo);
      })
      ->get()
      ->unique('id_grupo');

    $pdf = Pdf::loadView('inscripciones.pdf', compact('comprobante', 'inscripciones'));

    return $pdf->download('Comprobante_' . $comprobante->alumno->numero_cuenta . '.pdf');
  }
}
