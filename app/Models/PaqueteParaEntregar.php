<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaqueteParaEntregar
 * 
 * @property int $id_paquete
 * @property string $codigo_ṕostal
 * @property string $calle
 * @property string $nro_puerta
 * @property string $observaciones_direccion
 * @property float $latitud
 * @property float $longitud
 * 
 * @property Paquete $paquete
 * @property EntregaPaquete $entrega_paquete
 *
 * @package App\Models
 */
class PaqueteParaEntregar extends Model
{
	protected $table = 'paquete_para_entregar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'latitud' => 'float',
		'longitud' => 'float'
	];

	protected $fillable = [
		'id_paquete',
		'codigo_ṕostal',
		'calle',
		'nro_puerta',
		'observaciones_direccion',
		'latitud',
		'longitud'
	];

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}

	public function entrega_paquete()
	{
		return $this->hasOne(EntregaPaquete::class, 'id_paquete', 'id_paquete');
	}
}
