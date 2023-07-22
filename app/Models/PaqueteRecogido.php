<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaqueteRecogido
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_recogido
 * 
 * @property Paquete $paquete
 *
 * @package App\Models
 */
class PaqueteRecogido extends Model
{
	protected $table = 'paquete_recogido';
	protected $primaryKey = 'id_paquete';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'fecha_recogido' => 'datetime'
	];

	protected $fillable = [
		'fecha_recogido'
	];

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}
}
