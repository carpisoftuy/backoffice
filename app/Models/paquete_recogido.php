<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paquete_recogido extends Model
{
    use HasFactory;

    protected $table = "paquete_recogido";

    public $timestamps = false;
    protected $fillable = [

        "id"

    ];
}
