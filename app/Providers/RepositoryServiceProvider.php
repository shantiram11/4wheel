<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\LocationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(\App\Interfaces\BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(\App\Interfaces\LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
