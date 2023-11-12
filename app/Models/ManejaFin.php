<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManejaFin extends Model
{
    use HasFactory;

    protected $table = 'maneja_fin';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'fecha_fin'
    ];
}
