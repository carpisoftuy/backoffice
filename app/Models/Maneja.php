<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Maneja
 * 
 * @property string $nombre_usuario
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * 
 * @property Camione $camione
 * @property Chofere $chofere
 * @property Collection|EntregaBulto[] $entrega_bultos
 * @property Collection|EntregaPaquete[] $entrega_paquetes
 * @property ManejaFin $maneja_fin
 *
 * @package App\Models
 */
class Maneja extends Model
{
	protected $table = 'maneja';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime'
	];

	public function camione()
	{
		return $this->belongsTo(Camione::class, 'id_camion');
	}

	public function chofere()
	{
		return $this->belongsTo(Chofere::class, 'nombre_usuario');
	}

	public function entrega_bultos()
	{
		return $this->hasMany(EntregaBulto::class, 'nombre_usuario');
	}

	public function entrega_paquetes()
	{
		return $this->hasMany(EntregaPaquete::class, 'nombre_usuario');
	}

	public function maneja_fin()
	{
		return $this->hasOne(ManejaFin::class, 'nombre_usuario');
	}
}
