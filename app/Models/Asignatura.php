<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 * 
 * @property int $id_asignatura
 * @property string $clave_asignatura
 * @property string $nombre_asignatura
 * @property int $creditos_asignatura
 * @property int $creditos_laboratorio
 * @property string $tipo_asignatura
 * 
 * @property Collection|Grupo[] $grupos
 *
 * @package App\Models
 */
class Asignatura extends Model
{
	protected $table = 'Asignatura';
	protected $primaryKey = 'id_asignatura';
	public $timestamps = false;

	protected $casts = [
		'creditos_asignatura' => 'int',
		'creditos_laboratorio' => 'int'
	];

	protected $fillable = [
		'clave_asignatura',
		'nombre_asignatura',
		'creditos_asignatura',
		'creditos_laboratorio',
		'tipo_asignatura'
	];

	public function grupos()
	{
		return $this->hasMany(Grupo::class, 'id_asignatura');
	}
}
