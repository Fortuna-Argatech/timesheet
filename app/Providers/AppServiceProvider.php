<?php

namespace App\Providers;

// use Illuminate\Contracts\View\View;
use App\Models\Timesheet;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
        // if (config('app.env') === 'production' || config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
