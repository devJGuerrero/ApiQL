<?php

namespace Tests;

use Tests\Database\Seeds\DatabaseSeeder;
use Tests\Providers\ApiQLTestServiceProvider;
use DevJG\ApiQL\Providers\ApiQLServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests
 */
class TestCase extends BaseTestCase
{
    /**
     * En: Setting up the test environment
     * Es: Configurar el entorno de prueba
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__."/tests/database/factories");
        $this->artisan("migrate", ["--database" => "testbench"])->run();
        $this->seed(
            DatabaseSeeder::class
        );
    }

    /**
     * En: Load service providers
     * Es: Cargar proveedores de servicios
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            ApiQLServiceProvider::class,
            ApiQLTestServiceProvider::class
        ];
    }

    /**
     * En: Define environment configuration
     * Es: Definir configuración del entorno
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void {
        $app["config"]->set("database.default", "testbench");
        $app["config"]->set("database.connections.testbench", [
            "driver"   => "sqlite",
            "database" => ":memory:",
            "prefix"   => "",
        ]);
    }
}