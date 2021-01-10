<?php

namespace DevJG\ApiQL\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ApiQLServiceProvider
 * @package DevJG\ApiQL\Providers
 */
class ApiQLServiceProvider extends ServiceProvider
{
    /**
     * En: Bootstrap any application services
     * Es: Bootstrap cualquier servicio de aplicación
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../configs/apiql.php" => config_path("apiql.php")
        ]);
    }

    /**
     * En: Register any application services
     * Es: Registrar cualquier servicio de solicitud
     * @return void
     */
    public function register()
    {

    }
}