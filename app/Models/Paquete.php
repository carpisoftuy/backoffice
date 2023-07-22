<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 * 
 * @property int $id_paquete
 * @property int $peso
 * @property int $volumen
 * @property Carbon $fecha_despacho
 * 
 * @property Collection|AlmacenContienePaquete[] $almacen_contiene_paquetes
 * @property Collection|BultoContiene[] $bulto_contienes
 * @property Collection|CargaPaquete[] $carga_paquetes
 * @property PaqueteParaEntregar $paquete_para_entregar
 * @property PaqueteParaRecoger $paquete_para_recoger
 * @property PaqueteRecogido $paquete_recogido
 *
 * @package App\Models
 */
class Paquete extends Model
{
	protected $table = 'paquetes';
	protected $primaryKey = 'id_paquete';
	public $timestamps = false;

	protected $casts = [
		'peso' => 'int',
		'volumen' => 'int',
		'fecha_despacho' => 'datetime'
	];

	protected $fillable = [
		'peso',
		'volumen',
		'fecha_despacho'
	];

	public function almacen_contiene_paquetes()
	{
		return $this->hasMany(AlmacenContienePaquete::class, 'id_paquete');
	}

	public function bulto_contienes()
	{
		return $this->hasMany(BultoContiene::class, 'id_paquete');
	}

	public function carga_paquetes()
	{
		return $this->hasMany(CargaPaquete::class, 'id_paquete');
	}

	public function paquete_para_entregar()
	{
		return $this->hasOne(PaqueteParaEntregar::class, 'id_paquete');
	}

	public function paquete_para_recoger()
	{
		return $this->hasOne(PaqueteParaRecoger::class, 'id_paquete');
	}

	public function paquete_recogido()
	{
		return $this->hasOne(PaqueteRecogido::class, 'id_paquete');
	}
}
