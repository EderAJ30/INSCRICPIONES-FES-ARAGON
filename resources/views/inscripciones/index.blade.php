@extends('layouts.app')

@section('title', 'Gestión de Inscripciones')

@section('content')
<div class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-2xl shadow-[0_8px_32px_0_rgba(0,0,0,0.37)]">

  <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
      <h2 class="text-3xl font-bold text-white tracking-wide">Registro de Inscripciones</h2>
      <p class="text-sm text-gray-400 mt-1">Gestión y control del ciclo escolar actual</p>
    </div>

    <a href="{{ route('inscripciones.create') }}" class="bg-[#C5911F]/80 hover:bg-[#C5911F] backdrop-blur-sm border border-[#C5911F]/50 text-white font-semibold py-2.5 px-6 rounded-xl shadow-[0_4px_15px_rgba(197,145,31,0.3)] transition-all duration-300 transform hover:-translate-y-1">
      + Nueva Inscripción
    </a>
  </div>

  <div class="overflow-x-auto rounded-xl border border-white/10 bg-black/20">
    <table class="min-w-full text-sm text-left text-gray-300">
      <thead class="bg-white/5 text-[#C5911F] uppercase font-semibold tracking-wider border-b border-white/10">
        <tr>
          <th class="py-4 px-6">ID</th>
          <th class="py-4 px-6">Cuenta</th>
          <th class="py-4 px-6">Alumno</th>
          <th class="py-4 px-6">Asignatura</th>
          <th class="py-4 px-6">Grupo</th>
          <th class="py-4 px-6">Estatus</th>
          <th class="py-4 px-6 text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/10">
        @forelse($inscripciones as $inscripcion)
        <tr class="hover:bg-white/5 transition-colors duration-200">
          <td class="py-4 px-6 font-mono text-gray-400">{{ $inscripcion->id_inscripcion }}</td>
          <td class="py-4 px-6 font-semibold text-white">{{ $inscripcion->alumno->numero_cuenta ?? 'N/A' }}</td>
          <td class="py-4 px-6">
            {{ $inscripcion->alumno->apellido_paterno ?? '' }} {{ $inscripcion->alumno->nombre ?? 'Sin datos' }}
          </td>
          <td class="py-4 px-6">{{ $inscripcion->grupo->asignatura->nombre_asignatura ?? 'No asignada' }}</td>
          <td class="py-4 px-6 font-mono text-[#C5911F]">{{ $inscripcion->grupo->nombre_grupo ?? '-' }}</td>
          <td class="py-4 px-6">
            <span class="px-3 py-1 text-xs font-semibold rounded-full border backdrop-blur-sm
                            {{ $inscripcion->estatus_inscripcion === 'Regular' 
                                ? 'bg-green-500/20 text-green-300 border-green-500/30' 
                                : 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30' }}">
              {{ $inscripcion->estatus_inscripcion }}
            </span>
          </td>
          <td class="py-4 px-6 text-center space-x-3">
            <button class="text-blue-300 hover:text-white transition-colors" title="Editar">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </button>
            <button class="text-[#C5911F] hover:text-white transition-colors" title="Comprobante">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </button>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="py-8 text-center text-gray-400 italic">
            <div class="flex flex-col items-center justify-center space-y-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <span>No hay inscripciones registradas en el sistema.</span>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $inscripciones->links() }}
  </div>

</div>
@endsection