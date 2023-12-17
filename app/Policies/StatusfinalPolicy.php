<?php

namespace App\Policies;

use App\Models\Statusfinal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusfinalPolicy
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


    public function view(User $user, Statusfinal $statusfinal)
    {
        return $user->hasPermissionTo('Statusfinal View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Statusfinal Create');
    }


    public function update(User $user, Statusfinal $statusfinal)
    {
        return $user->hasPermissionTo('Statusfinal Update');
    }


    public function delete(User $user, Statusfinal $statusfinal)
    {
        return $user->hasPermissionTo('Statusfinal Delete');
    }


    public function restore(User $user, Statusfinal $statusfinal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Statusfinal  $statusfinal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Statusfinal $statusfinal)
    {
        //
    }
}
