<?php

namespace App\Policies;

use App\Models\Statussunarp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatussunarpPolicy
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


    public function view(User $user, Statussunarp $statussunarp)
    {
        return $user->hasPermissionTo('Statussunarp View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Statussunarp Create');
    }


    public function update(User $user, Statussunarp $statussunarp)
    {
        return $user->hasPermissionTo('Statussunarp Update');
    }


    public function delete(User $user, Statussunarp $statussunarp)
    {
        return $user->hasPermissionTo('Statusfinal Delete');
    }


    public function restore(User $user, Statussunarp $statussunarp)
    {
        //
    }


    public function forceDelete(User $user, Statussunarp $statussunarp)
    {
        //
    }
}
