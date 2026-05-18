<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 'Usuario';
  protected $primaryKey = 'id_usuario';

  // Si tu tabla no tiene las columnas created_at y updated_at
  public $timestamps = false;

  protected $fillable = [
    'correo_electronico',
    'contrasena_hash',
    'id_rol',
    'asociable_id',
    'asociable_type',
  ];

  protected $hidden = [
    'contrasena_hash',
  ];

  /**
   * Indicarle a Laravel que tu columna de contraseña se llama 'contrasena_hash'
   */
  public function getAuthPasswordName()
  {
    return 'contrasena_hash';
  }
  public function perfil()
  {
    return $this->morphTo(__FUNCTION__, 'asociable_type', 'asociable_id');
  }

  public function esAlumno(): bool
  {
    return $this->asociable_type === 'App\Models\Alumno';
  }
}
