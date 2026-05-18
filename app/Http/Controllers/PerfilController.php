<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inscripcion;
use App\Models\ComprobanteInscripcion;

class PerfilController extends Controller
{
  public function index()
  {
    $usuario = Auth::user();
    $alumno = $usuario->perfil;

    // Buscamos el último comprobante para determinar las materias vigentes
    $comprobante = ComprobanteInscripcion::where('id_alumno', $alumno->id_alumno)
      ->orderBy('id_comprobante', 'desc')
      ->first();

    $inscripciones = collect();
    if ($comprobante) {
      $inscripciones = Inscripcion::with(['grupo.asignatura', 'grupo.profesor', 'grupo.horario_grupos.aula'])
        ->where('id_alumno', $alumno->id_alumno)
        ->whereHas('grupo', function ($query) use ($comprobante) {
          $query->where('id_periodo', $comprobante->id_periodo);
        })
        ->get()
        ->unique('id_grupo');
    }

    return view('perfil.index', compact('usuario', 'alumno', 'inscripciones', 'comprobante'));
  }

  public function update(Request $request)
  {
    $usuario = Auth::user();
    $alumno = $usuario->perfil;

    $request->validate([
      'nombre' => ['required', 'string', 'max:50'],
      'apellido_paterno' => ['required', 'string', 'max:50'],
      'apellido_materno' => ['nullable', 'string', 'max:50'],
      'correo_electronico' => ['required', 'email', 'unique:Usuario,correo_electronico,' . $usuario->id_usuario . ',id_usuario'],
      'password' => ['nullable', 'min:8', 'confirmed'],
    ]);

    // Actualizar datos del Alumno
    $alumno->update([
      'nombre' => $request->nombre,
      'apellido_paterno' => $request->apellido_paterno,
      'apellido_materno' => $request->apellido_materno,
    ]);

    // Actualizar datos de la Cuenta de Usuario
    $usuario->correo_electronico = $request->correo_electronico;
    if ($request->filled('password')) {
      $usuario->contrasena_hash = Hash::make($request->password);
    }
    $usuario->save();

    return back()->with('success', 'Tus datos fueron actualizados correctamente.');
  }
}
