<?php

namespace App\Providers;

use App\Services\Resources\ResourceJsonService;
use App\Services\Resources\ResourcesService;
use Illuminate\Support\ServiceProvider;

class ResourcesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ResourcesService::class, function ($app){
            return new ResourceJsonService();
        });
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
