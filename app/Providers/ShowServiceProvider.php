<?php

namespace App\Providers;

use App\Services\Resources\ResourceJsonService;
use App\Services\Shows\ShowsService;
use Illuminate\Support\ServiceProvider;

class ShowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ShowsService::class, function(){
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
