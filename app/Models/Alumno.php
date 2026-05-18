<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 * 
 * @property int $id_alumno
 * @property string $numero_cuenta
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string|null $apellido_materno
 * @property string $correo_institucional
 * @property int $semestre_inscrito
 * @property string $turno
 * @property int $anio_ingreso
 * @property float|null $promedio
 * @property int $estatus_academico
 * @property string $sexo
 * @property int $id_carrera
 * 
 * @property Carrera $carrera
 * @property Collection|ComprobanteInscripcion[] $comprobante_inscripcions
 * @property Collection|Inscripcion[] $inscripcions
 *
 * @package App\Models
 */
class Alumno extends Model
{
	protected $table = 'Alumno';
	protected $primaryKey = 'id_alumno';
	public $timestamps = false;

	protected $casts = [
		'semestre_inscrito' => 'int',
		'anio_ingreso' => 'int',
		'promedio' => 'float',
		'estatus_academico' => 'int',
		'id_carrera' => 'int'
	];

	protected $fillable = [
		'numero_cuenta',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'correo_institucional',
		'semestre_inscrito',
		'turno',
		'anio_ingreso',
		'promedio',
		'estatus_academico',
		'sexo',
		'id_carrera'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'id_carrera');
	}

	public function comprobante_inscripcions()
	{
		return $this->hasMany(ComprobanteInscripcion::class, 'id_alumno');
	}

	public function inscripcions()
	{
		return $this->hasMany(Inscripcion::class, 'id_alumno');
	}
}
