<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gestiona
 * 
 * @property string $nombre_usuario
 * @property int $id_almacen
 * @property Carbon $fecha_inicio
 * 
 * @property Almacenero $almacenero
 * @property Almacene $almacene
 * @property GestionaFin $gestiona_fin
 *
 * @package App\Models
 */
class Gestiona extends Model
{
	protected $table = 'gestiona';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_almacen' => 'int',
		'fecha_inicio' => 'datetime'
	];

	public function almacenero()
	{
		return $this->belongsTo(Almacenero::class, 'nombre_usuario');
	}

	public function almacene()
	{
		return $this->belongsTo(Almacene::class, 'id_almacen');
	}

	public function gestiona_fin()
	{
		return $this->hasOne(GestionaFin::class, 'nombre_usuario');
	}
}
