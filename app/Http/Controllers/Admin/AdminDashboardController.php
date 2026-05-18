<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Aula;
use App\Models\Grupo;

class AdminDashboardController extends Controller
{
  public function index()
  {
    $totales = [
      'asignaturas' => Asignatura::count(),
      'profesores' => Profesor::count(),
      'aulas' => Aula::count(),
      'grupos' => Grupo::count(),
    ];

    return view('admin.dashboard', compact('totales'));
  }
}
