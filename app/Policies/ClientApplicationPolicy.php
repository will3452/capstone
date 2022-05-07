<?php

namespace App\Policies;

use App\Models\ClientApplication;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientApplicationPolicy
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
        return $user->can('view any client application');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ClientApplication $clientApplication)
    {
        return $user->can('view client application');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create client application');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ClientApplication $clientApplication)
    {
        return $user->can('update client application');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientApplication  $clientApplication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ClientApplication $clientApplication)
    {
        return $user->can('delete client application');
    }
}
