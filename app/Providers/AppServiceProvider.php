<?php

namespace App\Providers;

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
        // memastikan mencegah lazy loading jika dikerjakan lebih dari 1 developer dan di environment production (penjagaan untuk lazy loading)
        // Model::preventLazyLoading(! app()->isProduction());
    }
}
