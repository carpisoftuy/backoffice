<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntregaBulto
 * 
 * @property int $id_bulto
 * @property Carbon $fecha_entrega
 * @property string $nombre_usuario
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * 
 * @property Bulto $bulto
 * @property Maneja $maneja
 *
 * @package App\Models
 */
class EntregaBulto extends Model
{
	protected $table = 'entrega_bulto';
	protected $primaryKey = 'id_bulto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'fecha_entrega' => 'datetime',
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime'
	];

	protected $fillable = [
		'fecha_entrega',
		'nombre_usuario',
		'id_camion',
		'fecha_inicio'
	];

	public function bulto()
	{
		return $this->belongsTo(Bulto::class, 'id_bulto');
	}

	public function maneja()
	{
		return $this->belongsTo(Maneja::class, 'nombre_usuario')
					->where('maneja.nombre_usuario', '=', 'entrega_bulto.nombre_usuario')
					->where('maneja.id_camion', '=', 'entrega_bulto.id_camion')
					->where('maneja.fecha_inicio', '=', 'entrega_bulto.fecha_inicio');
	}
}
