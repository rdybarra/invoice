<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\SettingGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['settings.edit', 'invoices.partials.invoice-header', 'invoices.partials.invoice-footer'], function($view)
        {
            $view->with('settings', SettingGroup::first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
