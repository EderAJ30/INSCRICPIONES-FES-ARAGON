@extends('layouts.admin')

@section('content')
@php
$diasNombres = [1 => 'Lun', 2 => 'Mar', 3 => 'Mié', 4 => 'Jue', 5 => 'Vie', 6 => 'Sáb'];
@endphp

<div class="mb-6 flex justify-between items-center">
  <div>
    <h1 class="text-2xl font-bold text-white">Planeación de Grupos</h1>
    <p class="text-sm text-gray-400">Control de la oferta de horarios del periodo escolar activo.</p>
  </div>
  <a href="{{ route('admin.grupos.create') }}" class="bg-[#C5911F] hover:bg-[#b0811b] text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-md">
    + Crear Grupo y Horario
  </a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-500/20 border border-green-500 rounded-lg text-green-300 text-sm">{{ session('success') }}</div>
@endif

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl shadow-lg overflow-hidden">
  <table class="w-full text-left border-collapse">
    <thead>
      <tr class="bg-[#001A38] text-xs text-[#C5911F] uppercase tracking-wider font-bold border-b border-white/10">
        <th class="p-4">Grupo</th>
        <th class="p-4">Asignatura</th>
        <th class="p-4">Profesor</th>
        <th class="p-4">Horarios Asignados (Día | Módulos | Aula)</th>
      </tr>
    </thead>
    <tbody class="text-sm divide-y divide-white/5 text-gray-300">
      @forelse($grupos as $grupo)
      <tr class="hover:bg-white/5 transition-colors">
        <td class="p-4 font-bold text-[#C5911F] text-base">Gpo {{ $grupo->nombre_grupo }}</td>
        <td class="p-4">
          <span class="block text-white font-semibold">{{ $grupo->asignatura->nombre_asignatura }}</span>
          <span class="text-xs text-gray-500 font-mono">Clave: {{ $grupo->asignatura->clave_asignatura }} | Semestre: {{ $grupo->semestre_nivel }}°</span>
        </td>
        <td class="p-4 text-gray-300 uppercase text-xs font-medium">
          {{ $grupo->profesor->apellido_paterno }} {{ $grupo->profesor->nombre }}
        </td>
        <td class="p-4 space-y-1">
          @forelse($grupo->horario_grupos as $horario)
          <div class="text-xs font-mono text-gray-400 bg-white/5 px-2 py-1 rounded inline-block mr-2">
            <span class="text-white font-bold">{{ $diasNombres[$horario->dia_semana] }}:</span>
            {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}-{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
            <span class="text-emerald-400">({{ $horario->aula->nombre_aula }})</span>
          </div>
          @empty
          <span class="text-xs text-yellow-500 font-medium">Sin horarios configurados</span>
          @endforelse
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="p-8 text-center text-gray-500">No hay grupos creados en la planeación.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <div class="p-4 border-t border-white/10">{{ $grupos->links() }}</div>
</div>
@endsection