<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistema de Inscripciones - FES Aragón')</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Estilizando el scrollbar para que encaje con el tema oscuro/glass */
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
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <span class="text-2xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-white to-[#C5911F]">
          FES Aragón <span class="text-sm font-normal text-gray-300 ml-2">Ingeniería en Computación</span>
        </span>
      </div>
      <ul class="flex space-x-6 font-medium text-sm">
        <li>
          <a href="{{ route('inscripciones.index') }}" class="text-gray-200 hover:text-[#C5911F] transition-colors duration-300 relative group">
            Inscripciones
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#C5911F] transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>
        <li>
          <a href="#" class="text-gray-300 hover:text-[#C5911F] transition-colors duration-300">Alumnos</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="container mx-auto p-4 mt-8">
    @yield('content')
  </main>

</body>

</html>