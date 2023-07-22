<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chofer
 * 
 * @property string $nombre_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Maneja[] $manejas
 *
 * @package App\Models
 */
class Chofer extends Model
{
	protected $table = 'choferes';
	protected $primaryKey = 'nombre_usuario';
	public $incrementing = false;
	public $timestamps = false;

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'nombre_usuario');
	}

	public function manejas()
	{
		return $this->hasMany(Maneja::class, 'nombre_usuario');
	}
}
