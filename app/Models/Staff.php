<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['staff_id', 'name', 'department'];

    public function checkInsOuts()
    {
        return $this->hasMany(CheckInOut::class);
    }
}

