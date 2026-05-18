<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistema de Inscripciones - FES Aragón')</title>
  <link rel="icon" type="image/png" href="{{ asset('fes-aragon-blanco.png') }}">
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

    ::-webkit-scrollbar-thumb:hover {
      background: #b0811b;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-[#00152D] via-[#002B5C] to-[#001A38] min-h-screen font-sans text-gray-200 antialiased selection:bg-[#C5911F] selection:text-white">

  <nav class="sticky top-0 z-50 bg-[#00152D]/40 backdrop-blur-md border-b border-white/10 shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">

      <!-- Logotipo y Título -->
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

      <ul class="flex space-x-6 font-medium text-sm">
        <li>
          <a href="{{ route('dashboard') }}" class="text-gray-200 hover:text-[#C5911F] transition-colors">Inicio</a>
        </li>
        @auth
        <li>
          <a href="{{ route('perfil.index') }}" class="px-4 py-1.5 rounded-lg border border-[#C5911F]/40 bg-[#C5911F]/10 text-[#C5911F] hover:bg-[#C5911F] hover:text-white transition-all duration-300">
            {{ Auth::user()->perfil?->nombre ?? 'Administrador' }}
          </a>
        </li>
        @endauth
      </ul>

    </div>
  </nav>

  <main class="container mx-auto p-4 mt-8">
    @yield('content')
  </main>

</body>

</html>