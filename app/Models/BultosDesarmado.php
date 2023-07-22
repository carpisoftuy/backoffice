<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BultosDesarmado
 * 
 * @property int $id_bulto
 * @property Carbon $fecha_desarmado
 * 
 * @property Bulto $bulto
 *
 * @package App\Models
 */
class BultosDesarmado extends Model
{
	protected $table = 'bultos_desarmados';
	protected $primaryKey = 'id_bulto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bulto' => 'int',
		'fecha_desarmado' => 'datetime'
	];

	protected $fillable = [
		'fecha_desarmado'
	];

	public function bulto()
	{
		return $this->belongsTo(Bulto::class, 'id_bulto');
	}
}
