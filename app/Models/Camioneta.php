<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camioneta extends Model
{
    use HasFactory;

    protected $table = "camioneta";

    public $timestamps = false;
    protected $fillable = [

        "id"

    ];
}
