<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property string $nombre_usuario
 * @property string $contrasena
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $idioma_favorito
 * @property string $codigo_postal
 * @property string $calle
 * @property string $nro_puerta
 * @property string $observaciones_direccion
 * @property float $latitud
 * @property float $longitud
 * 
 * @property Admin $admin
 * @property Almacenero $almacenero
 * @property Chofere $chofere
 * @property Collection|UsuarioTelefono[] $usuario_telefonos
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'nombre_usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'latitud' => 'float',
		'longitud' => 'float'
	];

	protected $hidden = [
		'contrasena'
	];

	protected $fillable = [
		'contrasena',
		'nombre',
		'apellido',
		'email',
		'idioma_favorito',
		'codigo_postal',
		'calle',
		'nro_puerta',
		'observaciones_direccion',
		'latitud',
		'longitud'
	];

	public function admin()
	{
		return $this->hasOne(Admin::class, 'nombre_usuario');
	}

	public function almacenero()
	{
		return $this->hasOne(Almacenero::class, 'nombre_usuario');
	}

	public function chofer()
	{
		return $this->hasOne(Chofer::class, 'nombre_usuario');
	}

	public function usuario_telefonos()
	{
		return $this->hasMany(UsuarioTelefono::class, 'nombre_usuario');
	}
}
