<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Security extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'staff_id', 'password'];

    protected $hidden = ['password', 'remember_token'];
}

