<?php

namespace App\Policies;

use App\Models\Oficinaregistral;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OficinaregistralPolicy
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


    public function view(User $user, Oficinaregistral $oficinaregistral)
    {
        return $user->hasPermissionTo('Oficinaregistral View');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('Oficinaregistral Create');
    }


    public function update(User $user, Oficinaregistral $oficinaregistral)
    {
        return $user->hasPermissionTo('Oficinaregistral Update');
    }


    public function delete(User $user, Oficinaregistral $oficinaregistral)
    {
        return $user->hasPermissionTo('Oficinaregistral Delete');
    }


    public function restore(User $user, Oficinaregistral $oficinaregistral)
    {
        //
    }


    public function forceDelete(User $user, Oficinaregistral $oficinaregistral)
    {
        //
    }
}
