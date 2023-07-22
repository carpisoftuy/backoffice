<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AlmacenContieneBultoFin
 * 
 * @property int $id_bulto
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property AlmacenContieneBulto $almacen_contiene_bulto
 *
 * @package App\Models
 */
class AlmacenContieneBultoFin extends Model
{
	protected $table = 'almacen_contiene_bulto_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'id_bulto',
		'fecha_inicio',
		'fecha_fin'
	];

	public function almacen_contiene_bulto()
	{
		return $this->belongsTo(AlmacenContieneBulto::class, 'id_bulto')
					->where('almacen_contiene_bulto.id_bulto', '=', 'almacen_contiene_bulto_fin.id_bulto')
					->where('almacen_contiene_bulto.fecha_inicio', '=', 'almacen_contiene_bulto_fin.fecha_inicio');
	}
}
