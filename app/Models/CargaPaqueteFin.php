<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CargaPaqueteFin
 * 
 * @property int $id_paquete
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property CargaPaquete $carga_paquete
 *
 * @package App\Models
 */
class CargaPaqueteFin extends Model
{
	protected $table = 'carga_paquete_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'fecha_fin'
	];

	public function carga_paquete()
	{
		return $this->belongsTo(CargaPaquete::class, 'id_paquete')
					->where('carga_paquete.id_paquete', '=', 'carga_paquete_fin.id_paquete')
					->where('carga_paquete.id_camion', '=', 'carga_paquete_fin.id_camion')
					->where('carga_paquete.fecha_inicio', '=', 'carga_paquete_fin.fecha_inicio');
	}
}
