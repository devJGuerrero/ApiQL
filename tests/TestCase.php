<?php

namespace DevJG\ApiQL\Tests;

use DevJG\ApiQL\Providers\ApiQLServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package DevJG\ApiQL\Tests
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
            ApiQLServiceProvider::class
        ];
    }

    /**
     * En: Define environment configuration
     * Es: Definir configuración del entorno
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void {}
}