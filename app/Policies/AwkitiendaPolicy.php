<?php

namespace App\Policies;

use App\Models\Awkitienda;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwkitiendaPolicy
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


    public function view(User $user, Awkitienda $awkitienda)
    {
        return $user->hasPermissionTo('Tienda View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Tienda Create');
    }


    public function update(User $user, Awkitienda $awkitienda)
    {
        return $user->hasPermissionTo('Tienda Update');
    }


    public function delete(User $user, Awkitienda $awkitienda)
    {
        return $user->hasPermissionTo('Tienda Delete');
    }


    public function restore(User $user, Awkitienda $awkitienda)
    {
        //
    }


    public function forceDelete(User $user, Awkitienda $awkitienda)
    {
        //
    }
}
