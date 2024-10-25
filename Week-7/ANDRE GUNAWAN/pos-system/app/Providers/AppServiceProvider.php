<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->singleton(\Kreait\Firebase\Database::class, function ($app) {
        
        $serviceAccount = ServiceAccount::formJsonFIle(config('firebase.credentials.file'));

        return (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUrl(config('firebase.database.url'))
            ->createDatabase();
        });
    }

    public function boot(): void
    {
        //
    }
}
