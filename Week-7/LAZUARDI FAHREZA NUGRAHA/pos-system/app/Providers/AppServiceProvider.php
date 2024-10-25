<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
        $this->app->singleton(\Kreait\Firebase\Database::class, function($app) {
          $serviceAccount = ServiceAccount::fromJsonFile(config('firebase.credentials.file'));

          return (new Factory)
              ->withServicAccount($serviceAccount)
              ->withDatabaseUrl(config('firebase.database.url'))
              ->createDatabase();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
