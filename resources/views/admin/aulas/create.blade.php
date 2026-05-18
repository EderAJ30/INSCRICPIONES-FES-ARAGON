@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
  <h1 class="text-2xl font-bold text-white">Registrar Nueva Aula</h1>
  <a href="{{ route('admin.aulas.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Volver</a>
</div>

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-8 shadow-lg max-w-2xl">
  <form action="{{ route('admin.aulas.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Edificio (Ej. A, B, L4)</label>
        <input type="text" name="edificio" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none uppercase">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Nombre / Número de Aula (Ej. A215, Lab Computo)</label>
        <input type="text" name="nombre_aula" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>
      <div class="md:col-span-2">
        <label class="block text-xs font-medium text-gray-400 mb-1">Capacidad Máxima de Alumnos (Cupo)</label>
        <input type="number" name="capacidad_maxima" min="1" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>
    </div>
    <div class="text-right pt-4 border-t border-white/10">
      <button type="submit" class="bg-[#C5911F] hover:bg-[#b0811b] text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition-all">Mapear Aula</button>
    </div>
  </form>
</div>
@endsection