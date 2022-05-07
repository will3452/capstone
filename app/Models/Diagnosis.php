<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class);
    }

    public function userDiagnoses()
    {
        return $this->hasMany(UserDiagnosis::class);
    }
}
