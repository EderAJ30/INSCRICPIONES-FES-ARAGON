<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aula
 * 
 * @property int $id_aula
 * @property string $nombre_aula
 * @property string $edificio
 * @property int $capacidad_maxima
 * 
 * @property Collection|HorarioGrupo[] $horario_grupos
 *
 * @package App\Models
 */
class Aula extends Model
{
	protected $table = 'Aula';
	protected $primaryKey = 'id_aula';
	public $timestamps = false;

	protected $casts = [
		'capacidad_maxima' => 'int'
	];

	protected $fillable = [
		'nombre_aula',
		'edificio',
		'capacidad_maxima'
	];

	public function horario_grupos()
	{
		return $this->hasMany(HorarioGrupo::class, 'id_aula');
	}
}
