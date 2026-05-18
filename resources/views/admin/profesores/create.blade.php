@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
  <h1 class="text-2xl font-bold text-white">Registrar Nuevo Profesor</h1>
  <a href="{{ route('admin.profesores.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Volver</a>
</div>

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-8 shadow-lg max-w-4xl">
  <form action="{{ route('admin.profesores.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Nombre(s)</label>
        <input type="text" name="nombre" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Apellido Paterno</label>
        <input type="text" name="apellido_paterno" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Apellido Materno</label>
        <input type="text" name="apellido_materno" class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-400 mb-1">Número de Empleado</label>
        <input type="text" name="numero_empleado" class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none font-mono">
        @error('numero_empleado') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
      </div>
      <div class="md:col-span-2">
        <label class="block text-xs font-medium text-gray-400 mb-1">Correo Institucional</label>
        <input type="email" name="correo_institucional" required class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-1 focus:ring-[#C5911F] focus:outline-none">
        @error('correo_institucional') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="text-right pt-4 border-t border-white/10">
      <button type="submit" class="bg-[#C5911F] hover:bg-[#b0811b] text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition-all">Guardar Profesor</button>
    </div>
  </form>
</div>
@endsection