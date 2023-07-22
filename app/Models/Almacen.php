<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * 
 * @property int $id_almacen
 * @property int $espacio
 * @property int $espacio_ocupado
 * @property string $codigo_postal
 * @property string $calle
 * @property string $nro_puerta
 * @property string $observaciones_direccion
 * @property float $latitud
 * @property float $longitud
 * 
 * @property Collection|AlmacenContieneBulto[] $almacen_contiene_bultos
 * @property Collection|AlmacenContienePaquete[] $almacen_contiene_paquetes
 * @property Collection|Bulto[] $bultos
 * @property Collection|Gestiona[] $gestionas
 * @property Collection|PaqueteParaRecoger[] $paquete_para_recogers
 *
 * @package App\Models
 */
class Almacen extends Model
{
	protected $table = 'almacenes';
	protected $primaryKey = 'id_almacen';
	public $timestamps = false;

	protected $casts = [
		'espacio' => 'int',
		'espacio_ocupado' => 'int',
		'latitud' => 'float',
		'longitud' => 'float'
	];

	protected $fillable = [
		'espacio',
		'espacio_ocupado',
		'codigo_postal',
		'calle',
		'nro_puerta',
		'observaciones_direccion',
		'latitud',
		'longitud'
	];

	public function almacen_contiene_bultos()
	{
		return $this->hasMany(AlmacenContieneBulto::class, 'id_almacen');
	}

	public function almacen_contiene_paquetes()
	{
		return $this->hasMany(AlmacenContienePaquete::class, 'id_almacen');
	}

	public function bultos()
	{
		return $this->hasMany(Bulto::class, 'destino');
	}

	public function gestionas()
	{
		return $this->hasMany(Gestiona::class, 'id_almacen');
	}

	public function paquete_para_recogers()
	{
		return $this->hasMany(PaqueteParaRecoger::class, 'id_almacen');
	}
}
