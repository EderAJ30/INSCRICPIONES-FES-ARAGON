<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 * 
 * @property int $id_carrera
 * @property string $nombre_carrera
 * @property string $sistema
 * @property int $creditos_obligatorios
 * @property int $creditos_optativos
 * @property int $limite_semestres
 * 
 * @property Collection|Alumno[] $alumnos
 *
 * @package App\Models
 */
class Carrera extends Model
{
	protected $table = 'Carrera';
	protected $primaryKey = 'id_carrera';
	public $timestamps = false;

	protected $casts = [
		'creditos_obligatorios' => 'int',
		'creditos_optativos' => 'int',
		'limite_semestres' => 'int'
	];

	protected $fillable = [
		'nombre_carrera',
		'sistema',
		'creditos_obligatorios',
		'creditos_optativos',
		'limite_semestres'
	];

	public function alumnos()
	{
		return $this->hasMany(Alumno::class, 'id_carrera');
	}
}
