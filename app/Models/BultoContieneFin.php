<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BultoContieneFin
 * 
 * @property int $id_paquete
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * 
 * @property BultoContiene $bulto_contiene
 *
 * @package App\Models
 */
class BultoContieneFin extends Model
{
	protected $table = 'bulto_contiene_fin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_paquete' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'fecha_fin'
	];

	public function bulto_contiene()
	{
		return $this->belongsTo(BultoContiene::class, 'id_paquete')
					->where('bulto_contiene.id_paquete', '=', 'bulto_contiene_fin.id_paquete')
					->where('bulto_contiene.fecha_inicio', '=', 'bulto_contiene_fin.fecha_inicio');
	}
}
