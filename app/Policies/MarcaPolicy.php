<?php

namespace App\Policies;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarcaPolicy
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


    public function view(User $user, Marca $marca)
    {
        return $user->hasPermissionTo('Marca view');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Marca Create');
    }


    public function update(User $user, Marca $marca)
    {
        return $user->hasPermissionTo('Marca Update');
    }


    public function delete(User $user, Marca $marca)
    {
        return $user->hasPermissionTo('Marca Delete');
    }


    public function restore(User $user, Marca $marca)
    {
        //
    }


    public function forceDelete(User $user, Marca $marca)
    {
        //
    }
}
