@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
  <div>
    <h1 class="text-2xl font-bold text-white">Catálogo de Aulas e Infraestructura</h1>
    <p class="text-sm text-gray-400">Control de espacios físicos disponibles en los edificios.</p>
  </div>
  <a href="{{ route('admin.aulas.create') }}" class="bg-[#C5911F] hover:bg-[#b0811b] text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-md">
    + Nueva Aula
  </a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-500/20 border border-green-500 rounded-lg text-green-300 text-sm">{{ session('success') }}</div>
@endif

<div class="bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl shadow-lg overflow-hidden max-w-4xl">
  <table class="w-full text-left border-collapse">
    <thead>
      <tr class="bg-[#001A38] text-xs text-[#C5911F] uppercase tracking-wider font-bold border-b border-white/10">
        <th class="p-4">Edificio</th>
        <th class="p-4">Salón / Aula</th>
        <th class="p-4 text-center">Capacidad Máxima</th>
        <th class="p-4 text-center">Acciones</th>
      </tr>
    </thead>
    <tbody class="text-sm divide-y divide-white/5 text-gray-300">
      @forelse($aulas as $aula)
      <tr class="hover:bg-white/5 transition-colors">
        <td class="p-4 font-bold text-white uppercase tracking-wide">Edificio {{ $aula->edificio }}</td>
        <td class="p-4 font-mono text-gray-300">{{ $aula->nombre_aula }}</td>
        <td class="p-4 text-center text-emerald-400 font-semibold">{{ $aula->capacidad_maxima }} Alumnos</td>
        <td class="p-4 text-center space-x-2">
          <a href="{{ route('admin.aulas.edit', $aula->id_aula) }}" class="text-blue-400 hover:text-blue-300 transition-colors">Editar</a>
          <form action="{{ route('admin.aulas.destroy', $aula->id_aula) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar aula?');">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Eliminar</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="p-8 text-center text-gray-500">Sin aulas mapeadas.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <div class="p-4 border-t border-white/10">{{ $aulas->links() }}</div>
</div>
@endsection