<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && in_array({$role}, auth()->user()->roles()->get()->pluck('name')->toArray())): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('notrole', function ($role) {
            return "<?php if(auth()->check() && !in_array({$role}, auth()->user()->roles()->get()->pluck('name')->toArray())): ?>";
        });

        Blade::directive('endnotrole', function () {
            return "<?php endif; ?>";
        });
    }
}
