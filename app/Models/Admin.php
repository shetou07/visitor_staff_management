<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // Fillable fields
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hidden fields
    protected $hidden = [
        'password', 'remember_token',
    ];
}

