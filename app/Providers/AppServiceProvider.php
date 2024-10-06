<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        Model::preventLazyLoading();

        // css framework config
        // Paginator::useTailwind();

        // auth dengan gate method
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return ($job->employer->user->is($user));
        // }); // diganti dengan policy, lihat JobPolicy
    }
}
