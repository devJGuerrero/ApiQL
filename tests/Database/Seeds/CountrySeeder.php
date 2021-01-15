<?php

namespace Tests\Database\Seeds;

use Tests\Models\Country;
use Illuminate\Database\Seeder;

/**
 * Class CountrySeeder
 * @package Tests\Database\Seeds
 */
class CountrySeeder extends Seeder
{
    /**
     * En: Seed the application's database
     * Es: Sembrar la base de datos de la aplicación
     * @return void
     */
    public function run(): void
    {
        Country::factory()->count(5)->make();
    }
}
