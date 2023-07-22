<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CargaPaquete
 * 
 * @property int $id_paquete
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * 
 * @property Camione $camione
 * @property Paquete $paquete
 * @property CargaPaqueteFin $carga_paquete_fin
 *
 * @package App\Models
 */
class CargaPaquete extends Model
{
	protected $table = 'carga_paquete';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime'
	];

	public function camion()
	{
		return $this->belongsTo(Camione::class, 'id_camion');
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}

	public function carga_paquete_fin()
	{
		return $this->hasOne(CargaPaqueteFin::class, 'id_paquete');
	}
}
