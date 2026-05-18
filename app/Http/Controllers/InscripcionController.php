<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
  public function index()
  {
    $inscripciones = Inscripcion::with(['alumno', 'grupo.asignatura'])
      ->orderBy('fecha_inscripcion', 'desc')
      ->paginate(15);

    return view('inscripciones.index', compact('inscripciones'));
  }

  public function create()
  {
    return view('inscripciones.create');
  }
}
