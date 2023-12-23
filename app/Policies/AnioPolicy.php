<?php

namespace App\Policies;

use App\Models\Anio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnioPolicy
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


    public function view(User $user, Anio $anio)
    {
        return $user->hasPermissionTo('view Anio');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create Anio');
    }


    public function update(User $user, Anio $anio)
    {
        return $user->hasPermissionTo('update Anio');
    }


    public function delete(User $user, Anio $anio)
    {
        return $user->hasPermissionTo('delete Anio');
    }


    public function restore(User $user, Anio $anio)
    {
        //
    }


    public function forceDelete(User $user, Anio $anio)
    {
        //
    }
}
