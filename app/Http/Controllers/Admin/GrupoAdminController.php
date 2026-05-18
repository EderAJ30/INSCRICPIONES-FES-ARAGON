<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Grupo;
use App\Models\HorarioGrupo;
use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Aula;
use App\Models\PeriodoEscolar;

class GrupoAdminController extends Controller
{
  public function index()
  {
    $grupos = Grupo::with(['asignatura', 'profesor', 'horario_grupos.aula', 'periodo_escolar'])->paginate(15);
    return view('admin.grupos.index', compact('grupos'));
  }

  public function create()
  {
    // Traemos todos los catálogos base para llenar los selects del formulario
    $asignaturas = Asignatura::orderBy('nombre_asignatura')->get();
    $profesores = Profesor::orderBy('apellido_paterno')->get();
    $aulas = Aula::orderBy('edificio')->orderBy('nombre_aula')->get();
    $periodos = PeriodoEscolar::orderBy('id_periodo', 'desc')->get();

    return view('admin.grupos.create', compact('asignaturas', 'profesores', 'aulas', 'periodos'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nombre_grupo' => 'required|string|max:10',
      'id_asignatura' => 'required|exists:Asignatura,id_asignatura',
      'id_profesor' => 'required|exists:Profesor,id_profesor',
      'id_periodo' => 'required|exists:PeriodoEscolar,id_periodo',
      'semestre_nivel' => 'required|integer|min:1',
      'horarios' => 'required|array|min:1',
      'horarios.*.dia_semana' => 'required|integer|between:1,6',
      'horarios.*.id_aula' => 'required|exists:Aula,id_aula',
      'horarios.*.hora_inicio' => 'required',
      'horarios.*.hora_fin' => 'required|after:horarios.*.hora_inicio',
    ]);

    try {
      DB::beginTransaction();

      // 1. Crear Cabecera del Grupo
      $grupo = Grupo::create([
        'nombre_grupo' => $request->nombre_grupo,
        'id_asignatura' => $request->id_asignatura,
        'id_profesor' => $request->id_profesor,
        'id_periodo' => $request->id_periodo,
        'semestre_nivel' => $request->semestre_nivel,
      ]);

      // 2. Crear los Horarios asignados al grupo
      foreach ($request->horarios as $h) {
        HorarioGrupo::create([
          'id_grupo' => $grupo->id_grupo,
          'id_aula' => $h['id_aula'],
          'dia_semana' => $h['dia_semana'],
          'hora_inicio' => $h['hora_inicio'],
          'hora_fin' => $h['hora_fin'],
        ]);
      }

      DB::commit();
      return redirect()->route('admin.grupos.index')->with('success', 'Grupo y horarios establecidos con éxito.');
    } catch (\Exception $e) {
      DB::rollBack();
      return back()->withErrors(['error' => 'Error al guardar la planeación: ' . $e->getMessage()])->withInput();
    }
  }
}
