<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 * 
 * @property int $id_grupo
 * @property string $nombre_grupo
 * @property int $id_asignatura
 * @property int $id_profesor
 * @property int $id_periodo
 * @property int $semestre_nivel
 * 
 * @property Asignatura $asignatura
 * @property PeriodoEscolar $periodo_escolar
 * @property Profesor $profesor
 * @property Collection|HorarioGrupo[] $horario_grupos
 * @property Collection|Inscripcion[] $inscripcions
 *
 * @package App\Models
 */
class Grupo extends Model
{
	protected $table = 'Grupo';
	protected $primaryKey = 'id_grupo';
	public $timestamps = false;

	protected $casts = [
		'id_asignatura' => 'int',
		'id_profesor' => 'int',
		'id_periodo' => 'int',
		'semestre_nivel' => 'int'
	];

	protected $fillable = [
		'nombre_grupo',
		'id_asignatura',
		'id_profesor',
		'id_periodo',
		'semestre_nivel'
	];

	public function asignatura()
	{
		return $this->belongsTo(Asignatura::class, 'id_asignatura');
	}

	public function periodo_escolar()
	{
		return $this->belongsTo(PeriodoEscolar::class, 'id_periodo');
	}

	public function profesor()
	{
		return $this->belongsTo(Profesor::class, 'id_profesor');
	}

	public function horario_grupos()
	{
		return $this->hasMany(HorarioGrupo::class, 'id_grupo');
	}

	public function inscripcions()
	{
		return $this->hasMany(Inscripcion::class, 'id_grupo');
	}
}
