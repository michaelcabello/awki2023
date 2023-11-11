<?php

namespace App\Policies;

use App\Models\Awkicliente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwkiclientePolicy
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


    public function view(User $user, Awkicliente $awkicliente)
    {
        return $user->hasPermissionTo('Cliente View');
        //return $user->id === $post->user_id || $user->hasPermissionTo('view Post');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Cliente Create');
    }


    public function update(User $user, Awkicliente $awkicliente)
    {
        return $user->hasPermissionTo('Cliente Update');
    }


    public function delete(User $user, Awkicliente $awkicliente)
    {
        return $user->hasPermissionTo('Cliente Delete');
    }


    public function restore(User $user, Awkicliente $awkicliente)
    {
        //
    }


    public function forceDelete(User $user, Awkicliente $awkicliente)
    {
        //
    }
}
