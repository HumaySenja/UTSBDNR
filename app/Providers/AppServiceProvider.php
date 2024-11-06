<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
        //
        View::composer('layouts.main', function ($view) {
            $cartCount = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
            $view->with('cartCount', $cartCount);
        });
    }
}
