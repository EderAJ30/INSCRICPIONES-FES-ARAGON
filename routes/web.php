<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;

Route::middleware('guest')->group(function () {
  Route::get('login', [AuthController::class, 'showLogin'])->name('login');
  Route::post('login', [AuthController::class, 'login']);

  Route::get('registro', [AuthController::class, 'showRegister'])->name('register');
  Route::post('registro', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
  Route::post('inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
  Route::get('inscripciones/comprobante/{id}', [InscripcionController::class, 'descargarComprobante'])->name('inscripciones.comprobante');
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
  Route::get('perfil', [PerfilController::class, 'index'])->name('perfil.index');
  Route::put('perfil', [PerfilController::class, 'update'])->name('perfil.update');
});

Route::get('inscripciones/resumen/{id}', [InscripcionController::class, 'resumen'])->name('inscripciones.resumen');


Route::get('/', function () {
  return redirect()->route('login');
});
