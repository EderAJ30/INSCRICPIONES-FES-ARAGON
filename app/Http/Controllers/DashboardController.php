<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\ComprobanteInscripcion;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    $usuario = Auth::user();
    $alumno = $usuario->esAlumno() ? $usuario->perfil : null;

    $yaInscrito = false;
    if ($alumno) {
      $yaInscrito = ComprobanteInscripcion::where('id_alumno', $alumno->id_alumno)
        ->where('id_periodo', 1)
        ->exists();
    }

    $query = Grupo::with(['asignatura', 'profesor', 'horario_grupos.aula']);

    $query->when($request->filled('grupo'), function ($q) use ($request) {
      $q->where('nombre_grupo', 'like', '%' . $request->grupo . '%');
    });
    $query->when($request->filled('asignatura'), function ($q) use ($request) {
      $q->whereHas('asignatura', function ($subQuery) use ($request) {
        $subQuery->where('nombre_asignatura', 'like', '%' . $request->asignatura . '%')
          ->orWhere('clave_asignatura', 'like', '%' . $request->asignatura . '%');
      });
    });
    $query->when($request->filled('profesor'), function ($q) use ($request) {
      $q->whereHas('profesor', function ($subQuery) use ($request) {
        $subQuery->where('nombre', 'like', '%' . $request->profesor . '%')
          ->orWhere('apellido_paterno', 'like', '%' . $request->profesor . '%');
      });
    });
    $query->when($request->filled('aula'), function ($q) use ($request) {
      $q->whereHas('horario_grupos.aula', function ($subQuery) use ($request) {
        $subQuery->where('nombre_aula', 'like', '%' . $request->aula . '%');
      });
    });

    $gruposPaginados = $query->paginate(24)->withQueryString();

    return view('dashboard', compact('alumno', 'gruposPaginados', 'yaInscrito'));
  }
}
