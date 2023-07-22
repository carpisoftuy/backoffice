<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BultoContiene
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_inicio
 * @property int $id_bulto
 * 
 * @property Bulto $bulto
 * @property Paquete $paquete
 * @property BultoContieneFin $bulto_contiene_fin
 *
 * @package App\Models
 */
class BultoContiene extends Model
{
	protected $table = 'bulto_contiene';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'fecha_inicio' => 'datetime',
		'id_bulto' => 'int'
	];

	protected $fillable = [
		'id_bulto'
	];

	public function bulto()
	{
		return $this->belongsTo(Bulto::class, 'id_bulto');
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'id_paquete');
	}

	public function bulto_contiene_fin()
	{
		return $this->hasOne(BultoContieneFin::class, 'id_paquete');
	}
}
