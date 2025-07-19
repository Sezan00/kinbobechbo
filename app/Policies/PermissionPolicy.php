<?php

namespace App\Policies;

use App\Models\Panel;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function assign(Panel $user){
        return $user->hasPermission('assign_role');
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $permission): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Panel $user): bool
    {
        return $user->hasPermission('create_permission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Panel $user, Permission $permission): bool
    {
        return $user->hasPermission('edit_permission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Panel $user, Permission $permission): bool
    {
        return $user->hasPermission('delete_permission');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permission $permission): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return false;
    }
}
