<?php

namespace App\Observers;

use App\Models\User;
use Carbon\Carbon;

class UserObserver
{
    public function creating(User $user)
    {
        $user['name'] = $user['first_name'] . ' ' . $user['last_name'];

        $user['age'] = Carbon::parse($user['birth_date'])->age;
    }
}
