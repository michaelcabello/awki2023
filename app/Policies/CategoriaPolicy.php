<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
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


    public function view(User $user, Categoria $categoria)
    {
        return $user->hasPermissionTo('view Categoria');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create Categoria');
    }


    public function update(User $user, Categoria $categoria)
    {
        return $user->hasPermissionTo('update Categoria');
    }


    public function delete(User $user, Categoria $categoria)
    {
        return $user->hasPermissionTo('delete Categoria');
    }


    public function restore(User $user, Categoria $categoria)
    {
        //
    }


    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
