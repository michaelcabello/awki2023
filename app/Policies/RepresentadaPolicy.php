<?php

namespace App\Policies;

use App\Models\Awkirepresentada;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepresentadaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Awkirepresentada $awkirepresentada)
    {
        return $user->hasPermissionTo('Representada View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Representada Create');
    }


    public function update(User $user, Awkirepresentada $awkirepresentada)
    {
        return $user->hasPermissionTo('Representada Update');
    }


    public function delete(User $user, Awkirepresentada $awkirepresentada)
    {
        return $user->hasPermissionTo('Representada Delete ');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Awkirepresentada  $awkirepresentada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Awkirepresentada $awkirepresentada)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Awkirepresentada  $awkirepresentada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Awkirepresentada $awkirepresentada)
    {
        //
    }
}
