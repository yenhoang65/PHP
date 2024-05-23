<?php

namespace App\Providers;

use App\Models\GeneralSettings;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
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
        Paginator::useBootstrap();


        $generalSetting = GeneralSettings::first();
         // set time zone
        Config::set('app.timezone',$generalSetting->time_zone);
        // share variable at all view
        view()->composer('*', function ($view) use ($generalSetting) {
            $view->with('settings',$generalSetting);
        });
    }
}
