<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Camion
 * 
 * @property int $id_camion
 * @property string $matricula
 * @property string $codigo_pais
 * @property int $capacidad_volumen
 * @property int $capacidad_peso
 * @property int $peso_ocupado
 * @property int $volumen_ocupado
 * 
 * @property Collection|CargaBulto[] $carga_bultos
 * @property Collection|CargaPaquete[] $carga_paquetes
 * @property Collection|Maneja[] $manejas
 *
 * @package App\Models
 */
class Camion extends Model
{
	protected $table = 'camiones';
	protected $primaryKey = 'id_camion';
	public $timestamps = false;

	protected $casts = [
		'capacidad_volumen' => 'int',
		'capacidad_peso' => 'int',
		'peso_ocupado' => 'int',
		'volumen_ocupado' => 'int'
	];

	protected $fillable = [
		'matricula',
		'codigo_pais',
		'capacidad_volumen',
		'capacidad_peso',
		'peso_ocupado',
		'volumen_ocupado'
	];

	public function carga_bultos()
	{
		return $this->hasMany(CargaBulto::class, 'id_camion');
	}

	public function carga_paquetes()
	{
		return $this->hasMany(CargaPaquete::class, 'id_camion');
	}

	public function manejas()
	{
		return $this->hasMany(Maneja::class, 'id_camion');
	}
}
