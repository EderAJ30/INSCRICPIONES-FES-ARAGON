@extends('layouts.admin')

@section('title', 'Catálogo de Asignaturas - Administración')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
  <div>
    <h1 class="text-2xl font-bold text-white">Catálogo de Asignaturas</h1>
    <p class="text-sm text-gray-400">Control y gestión de las materias del plan de estudios de Ingeniería en Computación.</p>
  </div>
  <a href="{{ route('admin.asignaturas.create') }}" class="inline-flex items-center bg-[#C5911F] hover:bg-[#b0811b] text-white px-4 py-2.5 rounded-xl text-sm font-bold transition-transform hover:-translate-y-0.5 shadow-lg">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
    </svg>
    Nueva Asignatura
  </a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 rounded-xl text-green-300 text-sm flex items-center shadow-md">
  <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
  </svg>
  {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-4 p-4 bg-red-500/20 border border-red-500/40 rounded-xl text-red-300 text-sm flex items-center shadow-md">
  <svg class="w-5 h-5 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
  </svg>
  {{ session('error') }}
</div>
@endif

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl shadow-xl overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-[#001A38] text-xs text-[#C5911F] uppercase tracking-wider font-bold border-b border-white/10 text-center">
          <th class="p-4 text-left style-th">Clave</th>
          <th class="p-4 text-left">Nombre de la Asignatura</th>
          <th class="p-4">Créditos Teoría</th>
          <th class="p-4">Créditos Lab</th>
          <th class="p-4">Tipo</th>
          <th class="p-4">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-sm divide-y divide-white/5 text-gray-300">
        @forelse($asignaturas as $asignatura)
        <tr class="hover:bg-white/5 transition-colors text-center">
          <td class="p-4 text-left font-mono text-gray-400 font-semibold">{{ $asignatura->clave_asignatura }}</td>
          <td class="p-4 text-left font-bold text-white uppercase tracking-wide truncate max-w-xs" title="{{ $asignatura->nombre_asignatura }}">
            {{ $asignatura->nombre_asignatura }}
          </td>
          <td class="p-4 font-medium">{{ str_pad($asignatura->creditos_asignatura, 2, '0', STR_PAD_LEFT) }}</td>
          <td class="p-4 font-medium">{{ str_pad($asignatura->creditos_laboratorio, 2, '0', STR_PAD_LEFT) }}</td>
          <td class="p-4">
            <span class="px-2.5 py-1 rounded-md text-xs font-semibold uppercase tracking-wider {{ strtolower($asignatura->tipo_asignatura) === 'obligatoria' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-purple-500/10 text-purple-400 border border-purple-500/20' }}">
              {{ $asignatura->tipo_asignatura }}
            </span>
          </td>
          <td class="p-4 space-x-3 whitespace-nowrap font-medium">
            <a href="{{ route('admin.asignaturas.edit', $asignatura->id_asignatura) }}" class="text-blue-400 hover:text-blue-300 transition-colors text-xs bg-blue-500/5 px-2.5 py-1.5 rounded-lg border border-blue-500/10">
              Editar
            </a>

            <form action="{{ route('admin.asignaturas.destroy', $asignatura->id_asignatura) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás completamente seguro de eliminar esta asignatura? Esta acción no se puede deshacer.');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-400 hover:text-red-300 transition-colors text-xs bg-red-500/5 px-2.5 py-1.5 rounded-lg border border-red-500/10">
                Eliminar
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="p-12 text-center text-gray-500 italic">
            <svg class="w-12 h-12 mx-auto text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            No se encontraron asignaturas registradas en el sistema.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($asignaturas->hasPages())
  <div class="p-4 border-t border-white/10 bg-[#001A38]/20">
    {{ $asignaturas->links() }}
  </div>
  @endif
</div>
@endsection