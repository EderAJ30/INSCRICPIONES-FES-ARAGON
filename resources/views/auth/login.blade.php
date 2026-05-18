<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('fes-aragon-blanco.png') }}">
  <title>Iniciar Sesión - FES Aragón</title>
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

<body class="bg-gradient-to-br from-[#00152D] via-[#002B5C] to-[#001A38] min-h-screen font-sans text-gray-200 antialiased selection:bg-[#C5911F] selection:text-white flex items-center justify-center p-4">

  <div class="w-full max-w-md bg-[#00152D]/40 backdrop-blur-lg border border-white/10 rounded-2xl p-8 shadow-[0_8px_32px_rgba(0,0,0,0.3)]">

    <div class="text-center mb-6">
      <!-- Logotipo Adaptado -->
      <img src="{{ asset('fes-aragon-blanco.png') }}" alt="Logotipo FES Aragón" class="h-14 w-auto object-contain mx-auto mb-3">

      <span class="text-xs font-semibold tracking-widest text-[#C5911F] uppercase block mb-1">FES ARAGÓN</span>
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-[#C5911F]">
        Iniciar Sesión
      </h2>
    </div>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="correo_electronico" class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico</label>
        <input type="email" name="correo_electronico" id="correo_electronico" value="{{ old('correo_electronico') }}" required autocomplete="username"
          class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2.5 text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#C5911F] focus:border-transparent transition-all">
        @error('correo_electronico')
        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Contraseña</label>
        <input type="password" name="password" id="password" required autocomplete="current-password"
          class="w-full bg-[#001A38]/50 border border-white/10 rounded-lg px-4 py-2.5 text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#C5911F] focus:border-transparent transition-all">
        @error('password')
        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-[#C5911F] to-[#b0811b] hover:from-[#b0811b] hover:to-[#8c6715] text-white font-semibold py-2.5 rounded-lg shadow-lg transform transition hover:-translate-y-0.5">
        Ingresar
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-400">
      ¿Aun no tienes cuenta? <a href="{{ route('register') }}" class="text-[#C5911F] hover:text-white transition-colors">Regístrate aquí</a>
    </p>
  </div>

</body>

</html>