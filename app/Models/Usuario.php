<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model implements Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'usuario';
    public $incrementing = true;
    public $timestamps = false; 

    public function getAuthIdentifierName()
    {
        return 'ID';
    }

    public function getAuthIdentifier()
    {
        return $this->ID;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return 'remember_token';
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
}
