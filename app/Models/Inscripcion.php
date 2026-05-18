<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscripcion
 * 
 * @property int $id_inscripcion
 * @property int $id_alumno
 * @property int $id_grupo
 * @property Carbon $fecha_inscripcion
 * @property float|null $calificacion_final
 * @property string $estatus_inscripcion
 * 
 * @property Alumno $alumno
 * @property Grupo $grupo
 *
 * @package App\Models
 */
class Inscripcion extends Model
{
	protected $table = 'Inscripcion';
	protected $primaryKey = 'id_inscripcion';
	public $timestamps = false;

	protected $casts = [
		'id_alumno' => 'int',
		'id_grupo' => 'int',
		'fecha_inscripcion' => 'datetime',
		'calificacion_final' => 'float'
	];

	protected $fillable = [
		'id_alumno',
		'id_grupo',
		'fecha_inscripcion',
		'calificacion_final',
		'estatus_inscripcion'
	];

	public function alumno()
	{
		return $this->belongsTo(Alumno::class, 'id_alumno');
	}

	public function grupo()
	{
		return $this->belongsTo(Grupo::class, 'id_grupo');
	}
}
