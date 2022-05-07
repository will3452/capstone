<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends User
{
    use HasFactory;
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('patient', function (Builder $builder) {
            $builder->where('type', 'patient');
        });
    }

}
