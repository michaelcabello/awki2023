<?php

namespace App\Policies;

//use App\Models\Role;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Role $role)
    {
        return $user->hasRole('Admin')|| $user->hasPermissionTo('Role View');
    }


    public function create(User $user)
    {
        return $user->hasRole('Admin')|| $user->hasPermissionTo('Role Create');
    }


    public function update(User $user, Role $role)
    {
        return $user->hasRole('Admin')|| $user->hasPermissionTo('Role Update');
    }


    public function delete(User $user, Role $role)
    {
        if($role->id === 1)
        {
            //throw new \Illuminate\Auth\Access\AuthorizationException('No se Puede Eliminar este Rol');
            //return false;
            $this->deny('No se Puede Eliminar este Rol');

        }
        return $user->hasRole('Admin') || $user->hasPermissionTo('Role Delete');
    }


    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
