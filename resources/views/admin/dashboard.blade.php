@extends('layouts.admin')

@section('title', 'Inicio - Panel Administrativo')

@section('content')
<div class="mb-8">
  <h1 class="text-3xl font-bold text-white mb-2">Panel de Administración</h1>
  <p class="text-gray-400">Bienvenido, {{ Auth::user()->correo_electronico }}. Administra los recursos del sistema.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <div class="bg-[#001A38]/50 border border-white/10 rounded-2xl p-6 shadow-lg flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-400">Asignaturas</p>
      <p class="text-2xl font-bold text-[#C5911F]">{{ $totales['asignaturas'] }}</p>
    </div>
  </div>
  <div class="bg-[#001A38]/50 border border-white/10 rounded-2xl p-6 shadow-lg flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-400">Profesores</p>
      <p class="text-2xl font-bold text-[#C5911F]">{{ $totales['profesores'] }}</p>
    </div>
  </div>
  <div class="bg-[#001A38]/50 border border-white/10 rounded-2xl p-6 shadow-lg flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-400">Aulas</p>
      <p class="text-2xl font-bold text-[#C5911F]">{{ $totales['aulas'] }}</p>
    </div>
  </div>
  <div class="bg-[#001A38]/50 border border-white/10 rounded-2xl p-6 shadow-lg flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-400">Grupos Activos</p>
      <p class="text-2xl font-bold text-[#C5911F]">{{ $totales['grupos'] }}</p>
    </div>
  </div>
</div>

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-8 shadow-lg text-center py-20">
  <svg class="w-16 h-16 mx-auto text-[#C5911F]/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
  </svg>
  <h3 class="text-xl font-medium text-white">Selecciona un catálogo del menú lateral</h3>
  <p class="text-sm text-gray-400 mt-2">Para comenzar a crear, editar o eliminar registros de la base de datos.</p>
</div>
@endsection