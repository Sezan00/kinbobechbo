<?php

namespace App\Policies;

use App\Models\Panel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function createRole(Panel $user): bool
    {
        return $user->hasPermission('Create_Roles');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Panel $user, Role $role): bool
    {
        return $user->hasPermission('edit_role');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(panel $user, Role $role): bool
    {
        return $user->hasPermission('delete_role');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return false;
    }
}
