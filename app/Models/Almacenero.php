<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacenero
 * 
 * @property string $nombre_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Gestiona[] $gestionas
 *
 * @package App\Models
 */
class Almacenero extends Model
{
	protected $table = 'almaceneros';
	protected $primaryKey = 'nombre_usuario';
	public $incrementing = false;
	public $timestamps = false;

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'nombre_usuario');
	}

	public function gestionas()
	{
		return $this->hasMany(Gestiona::class, 'nombre_usuario');
	}
}
