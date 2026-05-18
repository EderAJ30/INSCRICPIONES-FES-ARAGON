@extends('layouts.app')

@section('title', 'Dashboard - FES Aragón')

@section('content')
@php
$diasNombres = [1 => 'Lun', 2 => 'Mar', 3 => 'Mié', 4 => 'Jue', 5 => 'Vie', 6 => 'Sáb'];
@endphp

<div class="mb-8 bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg flex flex-col md:flex-row justify-between items-center gap-4">
  <div>
    <h1 class="text-2xl font-bold text-white mb-1">Bienvenido, {{ $alumno ? $alumno->nombre . ' ' . $alumno->apellido_paterno : Auth::user()->correo_electronico }}</h1>
    <p class="text-gray-400">Oferta académica disponible para el semestre en curso.</p>
  </div>
  <div class="flex items-center gap-4">
    @if($yaInscrito)
    <button disabled class="inline-flex items-center px-5 py-2.5 bg-gray-600/50 border border-white/10 text-gray-400 text-sm font-medium rounded-xl cursor-not-allowed shadow-inner" title="Ya cuentas con un comprobante de inscripción activo">
      Inscripción Completada
      <svg class="ml-2 w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
    </button>
    @else
    <a href="{{ route('inscripciones.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-[#C5911F] to-[#b0811b] hover:from-[#b0811b] hover:to-[#8c6715] text-white text-sm font-medium rounded-xl shadow-lg transform transition hover:-translate-y-0.5">
      Iniciar Inscripción
      <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </a>
    @endif

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors text-sm font-medium">Cerrar Sesión</button>
    </form>
  </div>
</div>

<div class="mb-8 bg-[#001A38]/50 border border-white/10 rounded-xl p-5 shadow-sm">
  <form id="search-form" action="{{ route('dashboard') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 items-end">
    <div>
      <label class="block text-xs font-medium text-gray-400 mb-1">Asignatura</label>
      <input type="text" name="asignatura" value="{{ request('asignatura') }}" class="w-full bg-[#00152D] border border-white/10 rounded-lg px-3 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
    </div>
    <div>
      <label class="block text-xs font-medium text-gray-400 mb-1">Grupo</label>
      <input type="text" name="grupo" value="{{ request('grupo') }}" class="w-full bg-[#00152D] border border-white/10 rounded-lg px-3 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
    </div>
    <div>
      <label class="block text-xs font-medium text-gray-400 mb-1">Profesor</label>
      <input type="text" name="profesor" value="{{ request('profesor') }}" class="w-full bg-[#00152D] border border-white/10 rounded-lg px-3 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
    </div>
    <div>
      <label class="block text-xs font-medium text-gray-400 mb-1">Aula</label>
      <input type="text" name="aula" value="{{ request('aula') }}" class="w-full bg-[#00152D] border border-white/10 rounded-lg px-3 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
    </div>
    <div class="flex gap-2">
      <button type="submit" class="w-full bg-[#C5911F] hover:bg-[#b0811b] text-white font-medium py-2 rounded-lg transition-colors text-sm">Buscar</button>
      <a href="{{ route('dashboard') }}" id="btn-clear" class="w-full bg-gray-700 hover:bg-gray-600 text-center text-white font-medium py-2 rounded-lg transition-colors text-sm flex items-center justify-center">Limpiar</a>
    </div>
  </form>
</div>

<div id="ajax-container" class="space-y-6 relative">
  <div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-[#00152D] text-[11px] text-[#C5911F] uppercase tracking-wider text-center font-bold border-b border-white/10">
          <th class="p-3 text-left">Profesor</th>
          <th class="p-3">Cve.</th>
          <th class="p-3 text-left">Asignatura</th>
          <th class="p-3">Grupo</th>
          <th class="p-3">Lun</th>
          <th class="p-3">Mar</th>
          <th class="p-3">Mié</th>
          <th class="p-3">Jue</th>
          <th class="p-3">Vie</th>
          <th class="p-3">Sáb</th>
          <th class="p-3">Aula</th>
        </tr>
      </thead>
      <tbody class="text-xs divide-y divide-white/5 text-gray-200">
        @forelse($gruposPaginados as $grupo)
        @php
        $celdasDias = [1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => ''];
        $aulas = [];
        foreach($grupo->horario_grupos as $horario) {
        $celdasDias[$horario->dia_semana] = \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') . '-' . \Carbon\Carbon::parse($horario->hora_fin)->format('H:i');
        $aulas[] = $horario->aula->nombre_aula;
        }
        @endphp
        <tr class="hover:bg-white/5 transition-colors text-center">
          <td class="p-3 text-left font-medium uppercase text-gray-300 whitespace-nowrap">
            {{ $grupo->profesor->apellido_paterno }} {{ $grupo->profesor->apellido_materno }} {{ $grupo->profesor->nombre }}
          </td>
          <td class="p-3 font-mono text-gray-400">{{ $grupo->asignatura->clave_asignatura }}</td>
          <td class="p-3 text-left font-bold text-white uppercase tracking-wide truncate max-w-xs" title="{{ $grupo->asignatura->nombre_asignatura }}">
            {{ $grupo->asignatura->nombre_asignatura }}
          </td>
          <td class="p-3 text-[#C5911F] font-bold">Gpo {{ $grupo->nombre_grupo }}</td>

          @for($d = 1; $d <= 6; $d++)
            <td class="p-2 text-[10px] font-mono text-gray-300">
            {!! $celdasDias[$d] ?: '<span class="text-gray-600">-</span>' !!}
            </td>
            @endfor

            <td class="p-3 font-semibold text-emerald-400 whitespace-nowrap">
              {{ !empty($aulas) ? implode(', ', array_unique($aulas)) : 'N/D' }}
            </td>
        </tr>
        @empty
        <tr>
          <td colspan="11" class="p-8 text-center text-gray-500 italic">No se encontraron grupos con los criterios seleccionados.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6 input-pagination">
    {{ $gruposPaginados->links() }}
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('search-form');
    const container = document.getElementById('ajax-container');
    const btnClear = document.getElementById('btn-clear');

    function executeFetch(url) {
      // Efecto visual de carga (Opacidad)
      container.classList.add('opacity-40', 'pointer-events-none');

      fetch(url, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');

          // Reemplazamos únicamente la estructura interna del contenedor
          container.innerHTML = doc.getElementById('ajax-container').innerHTML;

          // Re-vinculamos los eventos a los nuevos links de paginación creados dinámicamente
          bindPagination();
          container.classList.remove('opacity-40', 'pointer-events-none');
        })
        .catch(error => {
          console.error('Error en la petición AJAX:', error);
          container.classList.remove('opacity-40', 'pointer-events-none');
        });
    }

    function bindPagination() {
      document.querySelectorAll('#ajax-container .input-pagination a').forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          executeFetch(this.href);
        });
      });
    }

    // Interceptar submit del buscador
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new URLSearchParams(new FormData(form)).toString();
      const targetUrl = `${form.action}?${formData}`;
      executeFetch(targetUrl);
    });

    // Interceptar botón Limpiar
    btnClear.addEventListener('click', function(e) {
      e.preventDefault();
      form.reset();
      executeFetch(this.href);
    });

    // Vinculación inicial
    bindPagination();
  });
</script>
@endsection