<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AlmacenContienePaquete
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_inicio
 * @property int $id_almacen
 * 
 * @property Almacen $almacene
 * @property Paquete $paquete
 * @property AlmacenContienePaqueteFin $almacen_contiene_paquete_fin
 *
 * @package App\Models
 */
class AlmacenContienePaquete extends Model
{
	protected $table = 'almacen_contiene_paquete';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'fecha_inicio' => 'datetime',
		'id_almacen' => 'int'
	];

	protected $fillable = [
		'id_almacen'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacene::class, 'id_almacen');
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}

	public function almacen_contiene_paquete_fin()
	{
		return $this->hasOne(AlmacenContienePaqueteFin::class, 'id_paquete');
	}
}
