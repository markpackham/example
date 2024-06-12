<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\User;

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
     * Bootstrap any application services. So methods available to use anywhere.
     */
    public function boot(): void
    {
        // Disable lazy loading
        // force user to eager load instead
        // to reduce the number of SQL queries
        Model::preventLazyLoading();

        // Change style used for Pagination - eg Bootstrap or the default Tailwind
        // Paginator::useBootstrapFive();

        // Laravel Gate Facade - a conditional barrier
        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });
    }
}
