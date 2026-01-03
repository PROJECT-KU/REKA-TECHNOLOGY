<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\CategoriesPrice;
use Illuminate\Support\Facades\View;

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

        RateLimiter::for('job-applications', function ($request) {
            return [Limit::perMinute(100)->by($request->ip())];
        });

        // 🔽 SHARE CATEGORIES MENU (TANPA STATUS)
        View::composer('*', function ($view) {
            $view->with(
                'categoriesPricesMenu',
                CategoriesPrice::orderBy('categories')->get()
            );
        });
    }
}
