<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesor
 * 
 * @property int $id_profesor
 * @property string|null $numero_empleado
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string|null $apellido_materno
 * @property string $correo_institucional
 * 
 * @property Collection|Grupo[] $grupos
 *
 * @package App\Models
 */
class Profesor extends Model
{
	protected $table = 'Profesor';
	protected $primaryKey = 'id_profesor';
	public $timestamps = false;

	protected $fillable = [
		'numero_empleado',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'correo_institucional'
	];

	public function grupos()
	{
		return $this->hasMany(Grupo::class, 'id_profesor');
	}
}
