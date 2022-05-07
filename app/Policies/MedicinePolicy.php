<?php

namespace App\Policies;

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicinePolicy
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
        return $user->can('view any medicine');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Medicine $medicine)
    {
        return $user->can('view medicine');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create medicine');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Medicine $medicine)
    {
        return $user->can('update medicine');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Medicine $medicine)
    {
        return $user->can('delete medicine');
    }
}
