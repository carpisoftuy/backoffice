<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioTelefono
 * 
 * @property string $nombre_usuario
 * @property string $telefono
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class UsuarioTelefono extends Model
{
	protected $table = 'usuario_telefono';
	public $incrementing = false;
	public $timestamps = false;

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'nombre_usuario');
	}
}
