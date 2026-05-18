<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HorarioGrupo
 * 
 * @property int $id_horario
 * @property int $id_grupo
 * @property int $id_aula
 * @property int $dia_semana
 * @property Carbon $hora_inicio
 * @property Carbon $hora_fin
 * 
 * @property Aula $aula
 * @property Grupo $grupo
 *
 * @package App\Models
 */
class HorarioGrupo extends Model
{
	protected $table = 'HorarioGrupo';
	protected $primaryKey = 'id_horario';
	public $timestamps = false;

	protected $casts = [
		'id_grupo' => 'int',
		'id_aula' => 'int',
		'dia_semana' => 'int',
		'hora_inicio' => 'datetime',
		'hora_fin' => 'datetime'
	];

	protected $fillable = [
		'id_grupo',
		'id_aula',
		'dia_semana',
		'hora_inicio',
		'hora_fin'
	];

	public function aula()
	{
		return $this->belongsTo(Aula::class, 'id_aula');
	}

	public function grupo()
	{
		return $this->belongsTo(Grupo::class, 'id_grupo');
	}
}
