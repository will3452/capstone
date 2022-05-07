<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendingAppointment extends Appointment
{
    use HasFactory;

    protected $table = 'appointments';
    
    protected static function booted()
    {
        static::addGlobalScope('pending-appointmet', function (Builder $builder) {
            $builder->where('status', 'pending');
        });
    }

}
