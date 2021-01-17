<?php

namespace Tests\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ApiQLTestServiceProvider
 * @package Tests\Providers
 */
class ApiQLTestServiceProvider extends ServiceProvider
{
    /**
     * En: Bootstrap any application services
     * Es: Bootstrap cualquier servicio de aplicación
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom    (__DIR__ ."/../routes/api.php");
        $this->loadMigrationsFrom(__DIR__ ."/../database/migrations");
    }
}