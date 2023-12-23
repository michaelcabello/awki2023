<?php

namespace App\Policies;

use App\Models\Modello;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelloPolicy
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


    public function view(User $user, Modello $modello)
    {
        return $user->hasPermissionTo('Modello View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Modello Create');
    }


    public function update(User $user, Modello $modello)
    {
        return $user->hasPermissionTo('Modello Update');
    }


    public function delete(User $user, Modello $modello)
    {
        return $user->hasPermissionTo('Modello Delete');
    }


    public function restore(User $user, Modello $modello)
    {
        //
    }


    public function forceDelete(User $user, Modello $modello)
    {
        //
    }
}
