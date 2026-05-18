<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscripcionController;

Route::get('/', function () {
  return redirect()->route('inscripciones.index');
});

Route::resource('inscripciones', InscripcionController::class);
