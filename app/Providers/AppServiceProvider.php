<?php

namespace App\Providers;

use App\Bussines\Interface\NasaApiInterface;
use App\ExternalServices\Services\NasaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NasaApiInterface::class,NasaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
