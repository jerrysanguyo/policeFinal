<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // Share the $userRole with all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('userRole', Auth::user()->role);
            }
        });
    }
}
