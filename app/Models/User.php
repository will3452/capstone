<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'datetime',
    ];

    public function getPictureAttribute() {
        if (is_null($this->image)) {
            return '/unknown.png';
        }

        $arr = explode('/', $this->image);
        $endArr = end($arr);
        return "/storage/$endArr"; 

    }

    public function diagnoses()
    {
        return $this->hasMany(UserDiagnosis::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


    public function finalDiagnoses() {
        return $this->hasMany(FinalDiagnosis::class, 'patient_id');

    }
}
