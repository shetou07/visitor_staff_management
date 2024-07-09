<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckInOut extends Model
{
    protected $fillable = ['staff_id', 'check_in_time', 'check_out_time', 'status'];

    protected $dates = ['check_in_time', 'check_out_time'];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function getStatusAttribute()
    {
        return $this->check_out_time ? 'completed' : 'pending';
    }
}







