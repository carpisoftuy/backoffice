<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManejaFin
 * 
 * @property string $nombre_usuario
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property Maneja $maneja
 *
 * @package App\Models
 */
class ManejaFin extends Model
{
	protected $table = 'maneja_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_camion' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'fecha_fin'
	];

	public function maneja()
	{
		return $this->belongsTo(Maneja::class, 'nombre_usuario')
					->where('maneja.nombre_usuario', '=', 'maneja_fin.nombre_usuario')
					->where('maneja.id_camion', '=', 'maneja_fin.id_camion')
					->where('maneja.fecha_inicio', '=', 'maneja_fin.fecha_inicio');
	}
}
