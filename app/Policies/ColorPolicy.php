<?php

namespace App\Policies;

use App\Models\Color;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
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

    }


    public function view(User $user, Color $color)
    {
        return $user->hasPermissionTo('view Color');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create Color');
    }


    public function update(User $user, Color $color)
    {
        return $user->hasPermissionTo('update Color');
    }


    public function delete(User $user, Color $color)
    {
        return $user->hasPermissionTo('delete Color');
    }


    public function restore(User $user, Color $color)
    {
        //
    }


    public function forceDelete(User $user, Color $color)
    {
        //
    }
}
