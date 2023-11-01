<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BultosDesarmado extends Model
{
    use HasFactory;

    protected $table = "bulto_desarmado";

    public $timestamps = false;
    protected $fillable = [

        "id"

    ];
}
