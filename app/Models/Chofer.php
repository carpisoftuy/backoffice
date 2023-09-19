<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table = 'chofer';
    public $incrementing = true;
    public $timestamps = false; 
    use HasFactory;
}
