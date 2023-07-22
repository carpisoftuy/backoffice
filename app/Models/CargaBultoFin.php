<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CargaBultoFin
 * 
 * @property int $id_bulto
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property CargaBulto $carga_bulto
 *
 * @package App\Models
 */
class CargaBultoFin extends Model
{
	protected $table = 'carga_bulto_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'fecha_fin'
	];

	public function carga_bulto()
	{
		return $this->belongsTo(CargaBulto::class, 'id_bulto')
					->where('carga_bulto.id_bulto', '=', 'carga_bulto_fin.id_bulto')
					->where('carga_bulto.id_camion', '=', 'carga_bulto_fin.id_camion')
					->where('carga_bulto.fecha_inicio', '=', 'carga_bulto_fin.fecha_inicio');
	}
}
