@extends('layouts.app')

@section('title', 'Armar Horario - FES Aragón')

@section('content')
@php
$diasNombres = [1=>'Lun', 2=>'Mar', 3=>'Mié', 4=>'Jue', 5=>'Vie', 6=>'Sáb'];
@endphp

<div class="mb-6 bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg flex justify-between items-center">
  <div>
    <h1 class="text-2xl font-bold text-white">Inscripción Académica</h1>
    <p class="text-gray-400">Alumno: {{ $alumno->nombre }} {{ $alumno->apellido_paterno }} | Selecciona de 1 a 7 materias.</p>
  </div>
  <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Cancelar Inscripcion</a>
</div>

@if($errors->any())
<div class="mb-4 bg-red-500/20 border border-red-500/50 rounded-lg p-4 text-red-200 text-sm">
  <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
</div>
@endif

<form action="{{ route('inscripciones.store') }}" method="POST" id="formInscripcion">
  @csrf

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-4">

      <div class="bg-[#001A38]/50 border border-white/10 rounded-xl p-4 shadow-sm mb-4">
        <input type="text" id="filtroGrupos" placeholder="Buscar por asignatura, clave, profesor o grupo..." class="w-full bg-[#00152D] border border-white/10 rounded-lg px-4 py-2 text-gray-200 focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-[600px] overflow-y-auto pr-2 custom-scrollbar" id="listaGrupos">
        @foreach($gruposDisponibles as $grupo)
        <label class="tarjeta-grupo block bg-[#001A38]/50 border border-white/10 rounded-xl p-4 cursor-pointer hover:border-[#C5911F]/50 transition-colors focus-within:ring-1 focus-within:ring-[#C5911F]"
          data-texto="{{ strtolower($grupo->asignatura->nombre_asignatura . ' ' . $grupo->asignatura->clave_asignatura . ' ' . $grupo->profesor->nombre . ' ' . $grupo->nombre_grupo) }}">

          <div class="flex items-start gap-3">
            <input type="checkbox" name="grupos[]" value="{{ $grupo->id_grupo }}"
              class="chk-grupo mt-1 text-[#C5911F] bg-[#00152D] border-gray-600 rounded focus:ring-[#C5911F]"
              data-id="{{ $grupo->id_grupo }}"
              data-asignatura="{{ $grupo->asignatura->nombre_asignatura }}"
              data-grupo="{{ $grupo->nombre_grupo }}"
              data-horarios="{{ json_encode($grupo->horario_grupos) }}">

            <div class="flex-1">
              <h3 class="font-bold text-sm text-white leading-tight">{{ $grupo->asignatura->clave_asignatura }} - {{ $grupo->asignatura->nombre_asignatura }}</h3>
              <span class="text-[#C5911F] font-bold block text-xs mt-1">Grupo {{ $grupo->nombre_grupo }}</span>
              <p class="text-[11px] text-gray-400 mt-1">Prof: {{ $grupo->profesor->nombre }} {{ $grupo->profesor->apellido_paterno }}</p>

              <div class="mt-2 space-y-0.5">
                @foreach($grupo->horario_grupos as $horario)
                <span class="block text-[10px] text-gray-500 font-mono">
                  {{ $diasNombres[$horario->dia_semana] }} {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}-{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
                </span>
                @endforeach
              </div>
            </div>
          </div>
        </label>
        @endforeach
      </div>
    </div>

    <div class="lg:col-span-1">
      <div class="sticky top-24 bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-lg">
        <h2 class="text-lg font-semibold text-white mb-2">Materias Seleccionadas</h2>
        <div class="text-xs text-gray-400 mb-4 flex justify-between">
          <span>Mínimo: 1</span>
          <span id="contadorSeleccion" class="font-bold text-white">0 / 7</span>
        </div>

        <ul id="listaResumen" class="space-y-3 mb-6 text-sm">
          <li class="text-gray-500 text-xs italic">Aún no has seleccionado materias.</li>
        </ul>

        <button type="submit" id="btnConfirmar" disabled class="w-full bg-gradient-to-r from-[#C5911F] to-[#b0811b] hover:from-[#b0811b] disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold py-3 px-4 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
          Confirmar Inscripción
        </button>
      </div>
    </div>
  </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filtroInput = document.getElementById('filtroGrupos');
    const tarjetas = document.querySelectorAll('.tarjeta-grupo');
    const checkboxes = document.querySelectorAll('.chk-grupo');
    const listaResumen = document.getElementById('listaResumen');
    const contador = document.getElementById('contadorSeleccion');
    const btnConfirmar = document.getElementById('btnConfirmar');

    // Búsqueda en vivo
    filtroInput.addEventListener('input', function(e) {
      const termino = e.target.value.toLowerCase();
      tarjetas.forEach(tarjeta => {
        const texto = tarjeta.getAttribute('data-texto');
        tarjeta.style.display = texto.includes(termino) ? 'block' : 'none';
      });
    });

    // Lógica de validación
    checkboxes.forEach(chk => {
      chk.addEventListener('change', actualizarResumen);
    });

    function actualizarResumen() {
      let seleccionados = Array.from(checkboxes).filter(c => c.checked);

      // Validar límite máximo de 7
      if (seleccionados.length > 7) {
        alert('Solo puedes inscribir un máximo de 7 materias.');
        this.checked = false;
        seleccionados = Array.from(checkboxes).filter(c => c.checked);
      }

      // Validar empalmes (Frontend)
      if (this.checked && tieneEmpalme(this, seleccionados)) {
        alert('¡Error! Esta materia se empalma con otra que ya seleccionaste.');
        this.checked = false;
        seleccionados = Array.from(checkboxes).filter(c => c.checked);
      }

      // Actualizar UI
      listaResumen.innerHTML = '';
      if (seleccionados.length === 0) {
        listaResumen.innerHTML = '<li class="text-gray-500 text-xs italic">Aún no has seleccionado materias.</li>';
        btnConfirmar.disabled = true;
      } else {
        seleccionados.forEach(c => {
          const asig = c.getAttribute('data-asignatura');
          const grp = c.getAttribute('data-grupo');
          listaResumen.innerHTML += `
                    <li class="bg-[#001A38] p-3 rounded-lg border border-white/5 flex justify-between items-center">
                        <span class="text-gray-200 font-medium truncate pr-2" title="${asig}">${asig}</span>
                        <span class="text-[#C5911F] text-xs font-bold whitespace-nowrap">Gpo: ${grp}</span>
                    </li>`;
        });
        btnConfirmar.disabled = false;
      }

      contador.textContent = `${seleccionados.length} / 7`;
    }

    function tieneEmpalme(chkActual, seleccionados) {
      const horariosActual = JSON.parse(chkActual.getAttribute('data-horarios'));

      for (let chk of seleccionados) {
        if (chk === chkActual) continue;

        const horariosSeleccionado = JSON.parse(chk.getAttribute('data-horarios'));

        for (let h1 of horariosActual) {
          for (let h2 of horariosSeleccionado) {
            if (h1.dia_semana === h2.dia_semana) {
              if (h1.hora_inicio < h2.hora_fin && h1.hora_fin > h2.hora_inicio) {
                return true;
              }
            }
          }
        }
      }
      return false;
    }
  });
</script>
@endsection