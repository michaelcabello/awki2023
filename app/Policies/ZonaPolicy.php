<?php

namespace App\Policies;

use App\Models\User;

use App\Models\Awkizona;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonaPolicy
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


    public function view(User $user, Awkizona $awkizona)
    {
        return $user->hasPermissionTo('Zona View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Zona Create');
    }


    public function update(User $user, Awkizona $awkizona)
    {
        return $user->hasPermissionTo('Zona Update');
    }


    public function delete(User $user, Awkizona $awkizona)
    {
        return $user->hasPermissionTo('Zona Delete ');
    }


    public function restore(User $user, Awkizona $awkizona)
    {
        //
    }


    public function forceDelete(User $user, Awkizona $awkizona)
    {
        //
    }
}
