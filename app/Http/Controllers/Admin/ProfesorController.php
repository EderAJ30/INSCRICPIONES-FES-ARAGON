<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
  public function index()
  {
    $profesores = Profesor::orderBy('apellido_paterno', 'asc')->paginate(15);
    return view('admin.profesores.index', compact('profesores'));
  }

  public function create()
  {
    return view('admin.profesores.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'numero_empleado' => 'nullable|string|max:10|unique:Profesor,numero_empleado',
      'nombre' => 'required|string|max:50',
      'apellido_paterno' => 'required|string|max:50',
      'apellido_materno' => 'nullable|string|max:50',
      'correo_institucional' => 'required|email|max:100|unique:Profesor,correo_institucional',
    ]);

    Profesor::create($request->all());
    return redirect()->route('admin.profesores.index')->with('success', 'Profesor registrado con éxito.');
  }

  public function edit($id)
  {
    $profesor = Profesor::findOrFail($id);
    return view('admin.profesores.edit', compact('profesor'));
  }

  public function update(Request $request, $id)
  {
    $profesor = Profesor::findOrFail($id);
    $request->validate([
      'numero_empleado' => 'nullable|string|max:10|unique:Profesor,numero_empleado,' . $id . ',id_profesor',
      'nombre' => 'required|string|max:50',
      'apellido_paterno' => 'required|string|max:50',
      'apellido_materno' => 'nullable|string|max:50',
      'correo_institucional' => 'required|email|max:100|unique:Profesor,correo_institucional,' . $id . ',id_profesor',
    ]);

    $profesor->update($request->all());
    return redirect()->route('admin.profesores.index')->with('success', 'Datos del profesor actualizados.');
  }

  public function destroy($id)
  {
    try {
      Profesor::findOrFail($id)->delete();
      return redirect()->route('admin.profesores.index')->with('success', 'Profesor eliminado.');
    } catch (\Illuminate\Database\QueryException $e) {
      return redirect()->route('admin.profesores.index')->with('error', 'No se puede eliminar porque imparte clases activas.');
    }
  }
}
