<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('fes-aragon-blanco.png') }}">
  <title>@yield('title', 'Panel de Administración - FES Aragón')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: rgba(0, 43, 92, 0.5);
    }

    ::-webkit-scrollbar-thumb {
      background: #C5911F;
      border-radius: 4px;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-[#00152D] via-[#002B5C] to-[#001A38] min-h-screen font-sans text-gray-200 antialiased selection:bg-[#C5911F] selection:text-white flex">

  <aside class="w-64 bg-[#00152D]/80 backdrop-blur-xl border-r border-white/10 min-h-screen flex flex-col fixed shadow-[4px_0_24px_rgba(0,0,0,0.2)]">
    <div class="p-6 border-b border-white/10">
      <a href="#" class="flex items-center space-x-3 group">
        <img src="{{ asset('fes-aragon-blanco.png') }}"
          alt="Logotipo FES Aragón"
          class="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">

        <div class="flex flex-col md:flex-row md:items-baseline md:space-x-2">
          <span class="text-xl md:text-2xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-white to-[#C5911F]">
            FES Aragón
          </span>
        </div>
      </a>
      <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider">Gestión Escolar</p>
    </div>

    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
      <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2 pl-2">Dashboard</p>
      <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('admin.dashboard') ? 'bg-[#C5911F]/20 text-[#C5911F] border border-[#C5911F]/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-xl font-medium transition-colors">
        Inicio
      </a>

      <!-- <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-6 mb-2 pl-2">Catálogos CRUD</p>
      <a href="{{ route('admin.asignaturas.index') }}" class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('admin.asignaturas.*') ? 'bg-[#C5911F]/20 text-[#C5911F] border border-[#C5911F]/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-xl transition-colors">
        Asignaturas
      </a>
      <a href="{{ route('admin.profesores.index') }}" class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('admin.profesores.*') ? 'bg-[#C5911F]/20 text-[#C5911F] border border-[#C5911F]/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-xl transition-colors">
        Profesores
      </a>
      <a href="{{ route('admin.aulas.index') }}" class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('admin.aulas.*') ? 'bg-[#C5911F]/20 text-[#C5911F] border border-[#C5911F]/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-xl transition-colors">
        Aulas
      </a> -->

      <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-6 mb-2 pl-2">Planeación</p>
      <a href="{{ route('admin.grupos.index') }}" class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('admin.grupos.*') ? 'bg-[#C5911F]/20 text-[#C5911F] border border-[#C5911F]/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-xl transition-colors">
        Grupos y Horarios
      </a>
    </nav>

    <div class="p-4 border-t border-white/10">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500/10 rounded-lg transition-colors">
          Cerrar Sesión
        </button>
      </form>
    </div>
  </aside>

  <main class="ml-64 flex-1 p-8">
    @yield('content')
  </main>

</body>

</html>