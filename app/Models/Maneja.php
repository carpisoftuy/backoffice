<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maneja extends Model
{
    use HasFactory;

    protected $table = 'maneja';
    public $timestamps = false;

    protected $fillable = [
        'id_vehiculo',
        'id_usuario',
        'fecha_inicio'
    ];
}
