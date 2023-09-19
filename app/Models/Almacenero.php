<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacenero extends Model
{
    protected $table = 'almacenero';
    public $incrementing = true;
    public $timestamps = false; 
    use HasFactory;
}
