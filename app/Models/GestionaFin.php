<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GestionaFin
 * 
 * @property string $nombre_usuario
 * @property int $id_almacen
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property Gestiona $gestiona
 *
 * @package App\Models
 */
class GestionaFin extends Model
{
	protected $table = 'gestiona_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_almacen' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'nombre_usuario',
		'id_almacen',
		'fecha_inicio',
		'fecha_fin'
	];

	public function gestiona()
	{
		return $this->belongsTo(Gestiona::class, 'nombre_usuario')
					->where('gestiona.nombre_usuario', '=', 'gestiona_fin.nombre_usuario')
					->where('gestiona.id_almacen', '=', 'gestiona_fin.id_almacen')
					->where('gestiona.fecha_inicio', '=', 'gestiona_fin.fecha_inicio');
	}
}
