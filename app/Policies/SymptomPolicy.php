<?php

namespace App\Policies;

use App\Models\Symptom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SymptomPolicy
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
        return $user->can('view any symptom');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Symptom  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Symptom $medicine)
    {
        return $user->can('view symptom');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create symptom');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Symptom  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Symptom $medicine)
    {
        return $user->can('update symptom');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Symptom  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Symptom $medicine)
    {
        return $user->can('delete symptom');
    }
}
