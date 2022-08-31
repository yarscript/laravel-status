<?php

namespace Lineup\Status\Providers;

use Illuminate\Support\ServiceProvider;
use Lineup\Status\Contracts\StatusServiceContract;
use Lineup\Status\Services\StatusService;

class StatusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

    }

    public function register()
    {
        $this->app->bind(StatusServiceContract::class, StatusService::class);

    }
}