<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AlmacenContieneBulto
 * 
 * @property int $id_bulto
 * @property Carbon $fecha_inicio
 * @property int $id_almacen
 * 
 * @property Almacen $almacene
 * @property Bulto $bulto
 * @property AlmacenContieneBultoFin $almacen_contiene_bulto_fin
 *
 * @package App\Models
 */
class AlmacenContieneBulto extends Model
{
	protected $table = 'almacen_contiene_bulto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'fecha_inicio' => 'datetime',
		'id_almacen' => 'int'
	];

	protected $fillable = [
		'id_almacen'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacen::class, 'id_almacen');
	}

	public function bulto()
	{
		return $this->belongsTo(Bulto::class, 'id_bulto');
	}

	public function almacen_contiene_bulto_fin()
	{
		return $this->hasOne(AlmacenContieneBultoFin::class, 'id_bulto');
	}
}
