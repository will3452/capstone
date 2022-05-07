<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalDiagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'result',
    ];


    public function patient () {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor () {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
