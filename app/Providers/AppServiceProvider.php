<?php

namespace App\Providers;

use Elastic\Migrations\Filesystem\MigrationStorage;
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
        resolve(MigrationStorage::class)->registerPaths([
            '/elastic/migrations',
        ]);
    }
}
