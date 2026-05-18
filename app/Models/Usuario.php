<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $correo_electronico
 * @property string $contrasena_hash
 * @property int $id_rol
 * @property int|null $asociable_id
 * @property string|null $asociable_type
 * 
 * @property Rol $rol
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'Usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
		'asociable_id' => 'int'
	];

	protected $fillable = [
		'correo_electronico',
		'contrasena_hash',
		'id_rol',
		'asociable_id',
		'asociable_type'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}
}
