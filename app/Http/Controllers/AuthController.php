<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumno;

class AuthController extends Controller
{
  public function showLogin()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'correo_electronico' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt([
      'correo_electronico' => $credentials['correo_electronico'],
      'password' => $credentials['password']
    ])) {
      $request->session()->regenerate();

      if (Auth::user()->id_rol == 1) {
        return redirect()->route('admin.dashboard');
      }

      return redirect()->route('dashboard');
    }

    return back()->withErrors([
      'correo_electronico' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('correo_electronico');
  }

  public function showRegister()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    $validated = $request->validate([
      'numero_cuenta' => ['required', 'string', 'exists:Alumno,numero_cuenta'],
      'correo_electronico' => ['required', 'email', 'unique:Usuario,correo_electronico'],
      'password' => ['required', 'min:8', 'confirmed'],
    ], [
      'numero_cuenta.exists' => 'Este número de cuenta no está registrado en el sistema.',
      'correo_electronico.unique' => 'Este correo ya tiene una cuenta activa.',
    ]);

    $alumno = Alumno::where('numero_cuenta', $validated['numero_cuenta'])->first();

    $usuarioExistente = Usuario::where('asociable_type', 'App\Models\Alumno')
      ->where('asociable_id', $alumno->id_alumno)
      ->exists();

    if ($usuarioExistente) {
      return back()->withErrors([
        'numero_cuenta' => 'Este número de cuenta ya fue registrado anteriormente.'
      ])->withInput();
    }

    $usuario = Usuario::create([
      'correo_electronico' => $validated['correo_electronico'],
      'contrasena_hash' => Hash::make($validated['password']),
      'id_rol' => 1, // Rol de Alumno
      'asociable_id' => $alumno->id_alumno,
      'asociable_type' => 'App\Models\Alumno',
    ]);

    Auth::login($usuario);
    $request->session()->regenerate();

    return redirect()->route('dashboard');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }
}
