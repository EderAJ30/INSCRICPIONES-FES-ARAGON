<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriodoEscolar
 * 
 * @property int $id_periodo
 * @property string $nombre_periodo
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * @property bool $estatus_activo
 * 
 * @property Collection|ComprobanteInscripcion[] $comprobante_inscripcions
 * @property Collection|Grupo[] $grupos
 *
 * @package App\Models
 */
class PeriodoEscolar extends Model
{
	protected $table = 'PeriodoEscolar';
	protected $primaryKey = 'id_periodo';
	public $timestamps = false;

	protected $casts = [
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'estatus_activo' => 'bool'
	];

	protected $fillable = [
		'nombre_periodo',
		'fecha_inicio',
		'fecha_fin',
		'estatus_activo'
	];

	public function comprobante_inscripcions()
	{
		return $this->hasMany(ComprobanteInscripcion::class, 'id_periodo');
	}

	public function grupos()
	{
		return $this->hasMany(Grupo::class, 'id_periodo');
	}
}
