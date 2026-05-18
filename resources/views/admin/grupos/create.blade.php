@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
  <h1 class="text-2xl font-bold text-white">Configurar Grupo y Carga de Horarios</h1>
  <a href="{{ route('admin.grupos.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Volver</a>
</div>

@if($errors->any())
<div class="mb-4 p-4 bg-red-500/20 border border-red-500 rounded-lg text-red-300 text-sm">
  <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
</div>
@endif

<form action="{{ route('admin.grupos.store') }}" method="POST" class="space-y-6">
  @csrf

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1 bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg space-y-4 h-fit">
      <h2 class="text-md font-bold text-[#C5911F] uppercase tracking-wider border-b border-white/5 pb-2">Datos Base</h2>

      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Nombre del Grupo (Ej: 1151)</label>
        <input type="text" name="nombre_grupo" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-1 focus:ring-[#C5911F]">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Semestre / Nivel Académico</label>
        <input type="number" name="semestre_nivel" min="1" max="10" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:ring-1 focus:ring-[#C5911F]">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Periodo Escolar</label>
        <select name="id_periodo" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-3 py-2 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#C5911F]">
          @foreach($periodos as $p)
          <option value="{{ $p->id_periodo }}">{{ $p->nombre_periodo }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Asignatura</label>
        <select name="id_asignatura" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-3 py-2 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#C5911F]">
          @foreach($asignaturas as $a)
          <option value="{{ $a->id_asignatura }}">{{ $a->clave_asignatura }} - {{ $a->nombre_asignatura }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Profesor Asignado</label>
        <select name="id_profesor" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-3 py-2 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#C5911F]">
          @foreach($profesores as $p)
          <option value="{{ $p->id_profesor }}">{{ $p->apellido_paterno }} {{ $p->nombre }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="lg:col-span-2 bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg flex flex-col justify-between">
      <div>
        <div class="flex justify-between items-center border-b border-white/5 pb-2 mb-4">
          <h2 class="text-md font-bold text-[#C5911F] uppercase tracking-wider">Distribución de Horas semanales</h2>
          <button type="button" id="btn-add-horario" class="text-xs bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-1 px-3 rounded transition-colors">+ Agregar Día</button>
        </div>

        <div id="wrapper-horarios" class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-3 bg-[#001A38]/30 p-3 rounded-xl border border-white/5 items-end relative row-horario">
            <div>
              <label class="block text-[11px] text-gray-400 mb-1">Día</label>
              <select name="horarios[0][dia_semana]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1.5 text-xs text-gray-300 focus:outline-none">
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miércoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sábado</option>
              </select>
            </div>
            <div>
              <label class="block text-[11px] text-gray-400 mb-1">Aula / Salón</label>
              <select name="horarios[0][id_aula]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1.5 text-xs text-gray-300 focus:outline-none">
                @foreach($aulas as $au)
                <option value="{{ $au->id_aula }}">{{ $au->edificio }} - {{ $au->nombre_aula }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label class="block text-[11px] text-gray-400 mb-1">Hora Inicio</label>
              <input type="time" name="horarios[0][hora_inicio]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1 text-xs text-white focus:outline-none">
            </div>
            <div>
              <label class="block text-[11px] text-gray-400 mb-1">Hora Fin</label>
              <input type="time" name="horarios[0][hora_fin]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1 text-xs text-white focus:outline-none">
            </div>
          </div>
        </div>
      </div>

      <div class="text-right pt-6 mt-6 border-t border-white/5">
        <button type="submit" class="bg-[#C5911F] hover:bg-[#b0811b] text-white font-bold py-2.5 px-8 rounded-xl shadow-md transition-all">
          Publicar Grupo Completo
        </button>
      </div>
    </div>
  </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let rowIndex = 1;
    const wrapper = document.getElementById('wrapper-horarios');
    const btnAdd = document.getElementById('btn-add-horario');

    // Plantilla de opciones de aulas mapeada limpiamente desde PHP
    const aulasOptions = `{!! $aulas->map(fn($au) => "<option value='{$au->id_aula}'>{$au->edificio} - {$au->nombre_aula}</option>")->implode('') !!}`;

    btnAdd.addEventListener('click', function() {
      const div = document.createElement('div');
      div.className = 'grid grid-cols-1 md:grid-cols-4 gap-3 bg-[#001A38]/30 p-3 rounded-xl border border-white/5 items-end relative row-horario';

      // 🔴 SOLUCIÓN: Se eliminaron los backslashes (\) de ${rowIndex} y ${aulasOptions}
      div.innerHTML = `
            <div>
                <label class="block text-[11px] text-gray-400 mb-1">Día</label>
                <select name="horarios[${rowIndex}][dia_semana]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1.5 text-xs text-gray-300 focus:outline-none">
                    <option value="1">Lunes</option><option value="2">Martes</option><option value="3">Miércoles</option><option value="4">Jueves</option><option value="5">Viernes</option><option value="6">Sábado</option>
                </select>
            </div>
            <div>
                <label class="block text-[11px] text-gray-400 mb-1">Aula / Salón</label>
                <select name="horarios[${rowIndex}][id_aula]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1.5 text-xs text-gray-300 focus:outline-none">
                    ${aulasOptions}
                </select>
            </div>
            <div>
                <label class="block text-[11px] text-gray-400 mb-1">Hora Inicio</label>
                <input type="time" name="horarios[${rowIndex}][hora_inicio]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1 text-xs text-white focus:outline-none">
            </div>
            <div class="flex gap-2 items-center">
                <div class="flex-1">
                    <label class="block text-[11px] text-gray-400 mb-1">Hora Fin</label>
                    <input type="time" name="horarios[${rowIndex}][hora_fin]" required class="w-full bg-[#00152D] border border-white/10 rounded-lg px-2 py-1 text-xs text-white focus:outline-none">
                </div>
                <button type="button" class="bg-red-500/20 text-red-400 border border-red-500/30 px-2 py-1 rounded text-xs mt-5 hover:bg-red-500 hover:text-white transition-colors font-bold" onclick="this.closest('.row-horario').remove();">X</button>
            </div>
        `;
      wrapper.appendChild(div);
      rowIndex++;
    });
  });
</script>
@endsection