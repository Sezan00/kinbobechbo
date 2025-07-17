<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Panel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Panel $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Panel $user, Category $category): bool
    {

        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function createCategory(Panel $user): bool
    {
        return $user->hasPermission('add_category');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Panel $user): bool
    {
        return $user->hasPermission('delete category');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return false;
    }
}
