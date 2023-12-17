<?php

namespace App\Policies;

use App\Models\Tipodedocumento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipodedocumentoPolicy
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


    public function view(User $user, Tipodedocumento $tipodedocumento)
    {
        return $user->hasPermissionTo('Tipodedocumento View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Tipodedocument Create ');
    }


    public function update(User $user, Tipodedocumento $tipodedocumento)
    {
        return $user->hasPermissionTo('Tipodedocumento Update');
    }


    public function delete(User $user, Tipodedocumento $tipodedocumento)
    {
        return $user->hasPermissionTo('Tipodedocumento Delete');
    }

    public function restore(User $user, Tipodedocumento $tipodedocumento)
    {
        //
    }


    public function forceDelete(User $user, Tipodedocumento $tipodedocumento)
    {
        //
    }
}
