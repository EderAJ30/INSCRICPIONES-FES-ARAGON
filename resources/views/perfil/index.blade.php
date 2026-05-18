@extends('layouts.app')

@section('title', 'Mi Perfil y Horario - FES Aragón')

@section('content')
<div class="space-y-8">

  @if(session('info'))
  <div class="bg-[#C5911F]/20 border border-[#C5911F] text-yellow-200 p-4 rounded-xl text-sm shadow-md">
    {{ session('info') }}
  </div>
  @endif
  @if(session('success'))
  <div class="bg-green-500/20 border border-green-500 text-green-200 p-4 rounded-xl text-sm shadow-md">
    {{ session('success') }}
  </div>
  @endif

  <div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
      <div>
        <h2 class="text-xl font-bold text-white">Horario de Clases Semestral</h2>
        <p class="text-xs text-gray-400 mt-0.5">Tira oficial de asignaturas vigentes</p>
      </div>
      @if($comprobante)
      <a href="{{ route('inscripciones.comprobante', $comprobante->id_comprobante) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#C5911F] to-[#b0811b] hover:from-[#b0811b] text-white text-xs font-bold rounded-xl shadow-md transition-transform hover:-translate-y-0.5">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
        </svg>
        Descargar Comprobante Oficial (PDF)
      </a>
      @endif
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
  </div>

  <div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg max-w-4xl">
    <h2 class="text-xl font-bold text-white mb-2">Configuración de la Cuenta</h2>
    <p class="text-xs text-gray-400 mb-6">Administra tus datos de identidad institucional y credenciales de acceso</p>

    <form action="{{ route('perfil.update') }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1">Nombre(s)</label>
          <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1">Apellido Paterno</label>
          <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $alumno->apellido_paterno) }}" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1">Apellido Materno</label>
          <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $alumno->apellido_materno) }}" class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1">Número de Cuenta (No Editable)</label>
          <input type="text" value="{{ $alumno->numero_cuenta }}" disabled class="w-full bg-black/30 border border-white/5 rounded-lg px-4 py-2 text-gray-500 cursor-not-allowed text-sm font-mono">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1">Correo Electrónico</label>
          <input type="email" name="correo_electronico" value="{{ old('correo_electronico', $usuario->correo_electronico) }}" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
          @error('correo_electronico') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="border-t border-white/5 pt-4">
        <p class="text-xs text-[#C5911F] font-semibold mb-3">Cambiar Contraseña (Dejar vacío si deseas mantener la actual)</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-xs font-medium text-gray-400 mb-1">Nueva Contraseña</label>
            <input type="password" name="password" class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
            @error('password') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
          </div>
          <div>
            <label class="block text-xs font-medium text-gray-400 mb-1">Confirmar Nueva Contraseña</label>
            <input type="password" name="password_confirmation" class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none text-sm">
          </div>
        </div>
      </div>

      <div class="text-right pt-2">
        <button type="submit" class="bg-gradient-to-r from-[#C5911F] to-[#b0811b] hover:from-[#b0811b] text-white text-sm font-bold py-2 px-6 rounded-xl shadow-md transition-transform hover:-translate-y-0.5">
          Guardar Cambios
        </button>
      </div>
    </form>
  </div>
</div>
@endsection