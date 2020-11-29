<?php

namespace App\Providers;

use App\Services\Resources\ResourceJsonService;
use App\Services\Shows\ShowsService;
use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShowsService::class, function ($app){
            return new ShowsService(new ResourceJsonService());
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
