<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AlmacenContienePaqueteFin
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property AlmacenContienePaquete $almacen_contiene_paquete
 *
 * @package App\Models
 */
class AlmacenContienePaqueteFin extends Model
{
	protected $table = 'almacen_contiene_paquete_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'fecha_fin'
	];

	public function almacen_contiene_paquete()
	{
		return $this->belongsTo(AlmacenContienePaquete::class, 'id_paquete')
					->where('almacen_contiene_paquete.id_paquete', '=', 'almacen_contiene_paquete_fin.id_paquete')
					->where('almacen_contiene_paquete.fecha_inicio', '=', 'almacen_contiene_paquete_fin.fecha_inicio');
	}
}
