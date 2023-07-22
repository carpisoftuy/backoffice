<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bulto
 * 
 * @property int $id_bulto
 * @property Carbon $fecha_armado
 * @property int $volumen
 * @property int $peso
 * @property int $destino
 * 
 * @property Almacen $almacen
 * @property Collection|AlmacenContieneBulto[] $almacen_contiene_bultos
 * @property Collection|BultoContiene[] $bulto_contienes
 * @property BultosDesarmado $bultos_desarmado
 * @property Collection|CargaBulto[] $carga_bultos
 * @property EntregaBulto $entrega_bulto
 *
 * @package App\Models
 */
class Bulto extends Model
{
	protected $table = 'bultos';
	protected $primaryKey = 'id_bulto';
	public $timestamps = false;

	protected $casts = [
		'fecha_armado' => 'datetime',
		'volumen' => 'int',
		'peso' => 'int',
		'destino' => 'int'
	];

	protected $fillable = [
		'fecha_armado',
		'volumen',
		'peso',
		'destino'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacen::class, 'destino');
	}

	public function almacen_contiene_bultos()
	{
		return $this->hasMany(AlmacenContieneBulto::class, 'id_bulto');
	}

	public function bulto_contienes()
	{
		return $this->hasMany(BultoContiene::class, 'id_bulto');
	}

	public function bultos_desarmado()
	{
		return $this->hasOne(BultosDesarmado::class, 'id_bulto');
	}

	public function carga_bultos()
	{
		return $this->hasMany(CargaBulto::class, 'id_bulto');
	}

	public function entrega_bulto()
	{
		return $this->hasOne(EntregaBulto::class, 'id_bulto');
	}
}
