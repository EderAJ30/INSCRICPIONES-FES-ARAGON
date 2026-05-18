<?php

namespace App\Http\Controllers; // use App\Http\Controllers\Admin si estás usando subcarpeta

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
  public function index()
  {
    $aulas = Aula::orderBy('edificio', 'asc')->orderBy('nombre_aula', 'asc')->paginate(15);
    return view('admin.aulas.index', compact('aulas'));
  }

  public function create()
  {
    return view('admin.aulas.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nombre_aula' => 'required|string|max:50',
      'edificio' => 'required|string|max:50',
      'capacidad_maxima' => 'required|integer|min:1',
    ]);

    Aula::create($request->all());
    return redirect()->route('admin.aulas.index')->with('success', 'Aula mapeada con éxito.');
  }

  public function edit($id)
  {
    $aula = Aula::findOrFail($id);
    return view('admin.aulas.edit', compact('aula'));
  }

  public function update(Request $request, $id)
  {
    $aula = Aula::findOrFail($id);
    $request->validate([
      'nombre_aula' => 'required|string|max:50',
      'edificio' => 'required|string|max:50',
      'capacidad_maxima' => 'required|integer|min:1',
    ]);

    $aula->update($request->all());
    return redirect()->route('admin.aulas.index')->with('success', 'Aula actualizada.');
  }

  public function destroy($id)
  {
    try {
      Aula::findOrFail($id)->delete();
      return redirect()->route('admin.aulas.index')->with('success', 'Aula eliminada.');
    } catch (\Illuminate\Database\QueryException $e) {
      return redirect()->route('admin.aulas.index')->with('error', 'No se puede eliminar porque tiene horarios asignados.');
    }
  }
}
