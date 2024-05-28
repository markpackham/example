<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Disable lazy loading
        // force user to eager load instead
        // to reduce the number of SQL queries
        Model::preventLazyLoading();

        // Change style used for Pagination - eg Bootstrap or the default Tailwind
        // Paginator::useBootstrapFive();
    }
}
