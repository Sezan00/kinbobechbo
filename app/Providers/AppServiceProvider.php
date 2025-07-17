<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
Use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /** 
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::policy(\App\Models\Category::class, \App\Policies\CategoryPolicy::class);
        Gate::policy(\App\Models\Product::class, \App\Policies\ProductPolicy::class);
        Gate::policy(\App\Models\Permission::class, \App\Policies\PermissionPolicy::class);
        Gate::policy(\App\Models\Role::class, \App\Policies\RolePolicy::class);
    }
}
