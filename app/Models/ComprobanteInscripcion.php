<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ComprobanteInscripcion
 * 
 * @property int $id_comprobante
 * @property string $folio_verificacion
 * @property int $id_alumno
 * @property int $id_periodo
 * @property Carbon $fecha_emision
 * @property string $sello_digital
 * 
 * @property Alumno $alumno
 * @property PeriodoEscolar $periodo_escolar
 *
 * @package App\Models
 */
class ComprobanteInscripcion extends Model
{
	protected $table = 'ComprobanteInscripcion';
	protected $primaryKey = 'id_comprobante';
	public $timestamps = false;

	protected $casts = [
		'id_alumno' => 'int',
		'id_periodo' => 'int',
		'fecha_emision' => 'datetime'
	];

	protected $fillable = [
		'folio_verificacion',
		'id_alumno',
		'id_periodo',
		'fecha_emision',
		'sello_digital'
	];

	public function alumno()
	{
		return $this->belongsTo(Alumno::class, 'id_alumno');
	}

	public function periodo_escolar()
	{
		return $this->belongsTo(PeriodoEscolar::class, 'id_periodo');
	}
}
