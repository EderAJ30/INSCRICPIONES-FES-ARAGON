@extends('layouts.app')

@section('title', 'Inscripción Exitosa - FES Aragón')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
  <div class="bg-green-500/10 border border-green-500/20 backdrop-blur-lg rounded-2xl p-8 shadow-lg text-center mb-8">
    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
      <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
    </div>
    <h1 class="text-3xl font-bold text-white mb-2">¡Inscripción Confirmada!</h1>
    <p class="text-gray-400">Tu horario ha sido registrado exitosamente en el sistema.</p>
    <p class="text-xs text-gray-500 mt-2 font-mono">Folio: {{ $comprobante->folio_verificacion }}</p>
  </div>

  <div class="overflow-x-auto rounded-xl border border-white/10">
    <table class="w-full text-left border-collapse bg-[#001A38]/30">
      <thead>
        <tr class="bg-[#00152D] text-[11px] text-[#C5911F] uppercase tracking-wider text-center font-bold border-b border-white/10">
          <th class="p-3 text-left">Profesor</th>
          <th class="p-3">Cve.</th>
          <th class="p-3 text-left">Asignatura</th>
          <th class="p-3">Grupo</th>
          <th class="p-3">Tipo</th>
          <th class="p-3">Lun</th>
          <th class="p-3">Mar</th>
          <th class="p-3">Mié</th>
          <th class="p-3">Jue</th>
          <th class="p-3">Vie</th>
          <th class="p-3">Sáb</th>
          <th class="p-3">Salón</th>
        </tr>
      </thead>
      <tbody class="text-xs divide-y divide-white/5 text-gray-200">
        @forelse($inscripciones as $inscripcion)
        @php
        $g = $inscripcion->grupo;
        // Mapeo matricial de horas por días
        $celdasDias = [1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => ''];
        $salones = [];
        foreach($g->horario_grupos as $h) {
        $celdasDias[$h->dia_semana] = \Carbon\Carbon::parse($h->hora_inicio)->format('H:i') . ' a ' . \Carbon\Carbon::parse($h->hora_fin)->format('H:i');
        $salones[] = $h->aula->nombre_aula;
        }
        @endphp
        <tr class="hover:bg-white/5 transition-colors text-center">
          <td class="p-3 text-left font-medium uppercase text-gray-300 whitespace-nowrap">{{ $g->profesor->apellido_paterno }} {{ $g->profesor->apellido_materno }} {{ $g->profesor->nombre }}</td>
          <td class="p-3 font-mono text-gray-400">{{ $g->asignatura->clave_asignatura }}</td>
          <td class="p-3 text-left font-bold text-white uppercase tracking-wide">{{ $g->asignatura->nombre_asignatura }}</td>
          <td class="p-3 text-[#C5911F] font-bold">{{ $g->nombre_grupo }}</td>
          <td class="p-3 text-[10px] bg-white/5 font-semibold text-gray-400">PRESENCIAL</td>

          @for($d = 1; $d <= 6; $d++)
            <td class="p-2 text-[10px] font-mono leading-tight text-gray-300">
            {!! $celdasDias[$d] ?: '<span class="text-gray-600">-</span>' !!}
            </td>
            @endfor

            <td class="p-3 font-semibold text-emerald-400 whitespace-nowrap">{{ implode(', ', array_unique($salones)) }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="12" class="p-8 text-center text-gray-500 italic">No tienes asignaturas inscritas para este semestre.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="flex justify-center gap-4">
    <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-xl transition-colors">
      Ir al Inicio
    </a>
    <a href="{{ route('inscripciones.comprobante', $comprobante->id_comprobante) }}" target="_blank" class="px-6 py-3 bg-[#C5911F] hover:bg-[#b0811b] text-white font-bold rounded-xl shadow-lg flex items-center transition-colors">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
      </svg>
      Descargar Comprobante
    </a>
  </div>
</div>
@endsection