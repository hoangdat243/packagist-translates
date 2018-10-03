<?php

namespace Datht\Language;

use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
       include __DIR__.'/routes.php';
       $this->loadMigrationsFrom(__DIR__.'/migrations');
       include __DIR__.'/controller/LanguageController.php';
       include __DIR__.'/model/Language.php';

       $this->publishes([
             __DIR__.'/public/build' => public_path('build'),
             __DIR__.'/public/vendors' => public_path('vendors')
              ], 'public');
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/view', 'language');

    }
}
