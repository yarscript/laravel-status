<?php

namespace Yarscript\Status\Providers;

use Illuminate\Support\ServiceProvider;
use Yarscript\Status\Contracts\StatusServiceContract;
use Yarscript\Status\Services\StatusService;

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