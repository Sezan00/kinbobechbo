<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then:function(){
            Route::middleware('web')->group(base_path('routes/product.php'));
            Route::middleware('web')->group(base_path('routes/category.php'));
            Route::middleware('web')->group(base_path('routes/brand.php'));
            Route::middleware('web')->group(base_path('routes/feature.php'));
            Route::middleware('web')->group(base_path('routes/model.php'));
            Route::middleware('web')->group(base_path('routes/user.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
           $middleware->alias([
            'user' => AuthMiddleware::class,
            
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
