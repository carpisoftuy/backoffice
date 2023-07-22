<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntregaPaquete
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_entrega
 * @property string $nombre_usuario
 * @property int $id_camion
 * @property Carbon $fecha_inicio
 * 
 * @property Maneja $maneja
 * @property PaqueteParaEntregar $paquete_para_entregar
 *
 * @package App\Models
 */
class EntregaPaquete extends Model
{
	protected $table = 'entrega_paquete';
	protected $primaryKey = 'id_paquete';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
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

	public function maneja()
	{
		return $this->belongsTo(Maneja::class, 'nombre_usuario')
					->where('maneja.nombre_usuario', '=', 'entrega_paquete.nombre_usuario')
					->where('maneja.id_camion', '=', 'entrega_paquete.id_camion')
					->where('maneja.fecha_inicio', '=', 'entrega_paquete.fecha_inicio');
	}

	public function paquete_para_entregar()
	{
		return $this->belongsTo(PaqueteParaEntregar::class, 'id_paquete', 'id_paquete');
	}
}
