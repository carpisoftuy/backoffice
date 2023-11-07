<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paquete_entregado extends Model
{
    use HasFactory;

    protected $table = "paquete_entregado";

    public $timestamps = false;
    protected $fillable = [

        "id"

    ];
}
