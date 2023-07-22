<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CargaBulto
 * 
 * @property int $id_bulto
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * 
 * @property Bulto $bulto
 * @property Camion $camion
 * @property CargaBultoFin $carga_bulto_fin
 *
 * @package App\Models
 */
class CargaBulto extends Model
{
	protected $table = 'carga_bulto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime'
	];

	public function bulto()
	{
		return $this->belongsTo(Bulto::class, 'id_bulto');
	}

	public function camion()
	{
		return $this->belongsTo(Camion::class, 'id_camion');
	}

	public function carga_bulto_fin()
	{
		return $this->hasOne(CargaBultoFin::class, 'id_bulto');
	}
}
