<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property string $nombre_usuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admins';
	protected $primaryKey = 'nombre_usuario';
	public $incrementing = false;
	public $timestamps = false;

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'nombre_usuario');
	}
}
