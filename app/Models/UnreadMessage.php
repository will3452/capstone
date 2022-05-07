<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnreadMessage extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected static function booted()
    {
        static::addGlobalScope('unread-message', function (Builder $builder) {
            $builder->whereNull('read_at');
        });
    }
}
