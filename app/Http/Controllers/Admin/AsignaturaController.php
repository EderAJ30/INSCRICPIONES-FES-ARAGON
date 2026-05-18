<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
  public function index()
  {
    $asignaturas = Asignatura::orderBy('nombre_asignatura', 'asc')->paginate(15);
    return view('admin.asignaturas.index', compact('asignaturas'));
  }

  public function create()
  {
    return view('admin.asignaturas.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'clave_asignatura' => 'required|string|max:10|unique:Asignatura,clave_asignatura',
      'nombre_asignatura' => 'required|string|max:100',
      'creditos_asignatura' => 'required|integer|min:0',
      'creditos_laboratorio' => 'required|integer|min:0',
      'tipo_asignatura' => 'required|string|max:20',
    ]);

    Asignatura::create($request->all());

    return redirect()->route('admin.asignaturas.index')
      ->with('success', 'Asignatura creada correctamente.');
  }

  public function edit($id)
  {
    $asignatura = Asignatura::findOrFail($id);
    return view('admin.asignaturas.edit', compact('asignatura'));
  }

  public function update(Request $request, $id)
  {
    $asignatura = Asignatura::findOrFail($id);

    $request->validate([
      'clave_asignatura' => 'required|string|max:10|unique:Asignatura,clave_asignatura,' . $id . ',id_asignatura',
      'nombre_asignatura' => 'required|string|max:100',
      'creditos_asignatura' => 'required|integer|min:0',
      'creditos_laboratorio' => 'required|integer|min:0',
      'tipo_asignatura' => 'required|string|max:20',
    ]);

    $asignatura->update($request->all());

    return redirect()->route('admin.asignaturas.index')
      ->with('success', 'Asignatura actualizada correctamente.');
  }

  public function destroy($id)
  {
    $asignatura = Asignatura::findOrFail($id);

    try {
      $asignatura->delete();
      return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura eliminada.');
    } catch (\Illuminate\Database\QueryException $e) {
      return redirect()->route('admin.asignaturas.index')->with('error', 'No se puede eliminar la asignatura porque tiene grupos enlazados.');
    }
  }
}
