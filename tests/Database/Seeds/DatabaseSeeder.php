<?php

namespace Tests\Database\Seeds;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Tests\Database\Seeds
 */
class DatabaseSeeder extends Seeder
{
    /**
     * En: Seed the application's database
     * Es: Sembrar la base de datos de la aplicación
     * @return void
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class
        ]);
    }
}
