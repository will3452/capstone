<?php

namespace App\Policies;

use App\Models\Diagnosis;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiagnosisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view any diagnosis');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Diagnosis $diagnosis)
    {
        return $user->can('view diagnosis');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create diagnosis');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Diagnosis $diagnosis)
    {
        return $user->can('update diagnosis');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Diagnosis $diagnosis)
    {
        return $user->can('delete diagnosis');
    }
}
