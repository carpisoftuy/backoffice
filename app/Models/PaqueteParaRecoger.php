<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaqueteParaRecoger
 * 
 * @property int $id_paquete
 * @property int $id_almacen
 * 
 * @property Almacene $almacene
 * @property Paquete $paquete
 *
 * @package App\Models
 */
class PaqueteParaRecoger extends Model
{
	protected $table = 'paquete_para_recoger';
	protected $primaryKey = 'id_paquete';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'id_almacen' => 'int'
	];

	protected $fillable = [
		'id_almacen'
	];

	public function almacene()
	{
		return $this->belongsTo(Almacene::class, 'id_almacen');
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}
}
