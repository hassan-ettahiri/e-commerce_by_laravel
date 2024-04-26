<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\NavbarComposer;
use App\Http\View\Composers\ShopsidebareComposer;

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
        Schema::defaultStringLength(191);
        View::composer('Frontend.inc.navbar', NavbarComposer::class);
        View::composer('Frontend.inc.shopsidebare',ShopsidebareComposer::class);
    }
}
