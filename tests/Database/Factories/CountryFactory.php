<?php

namespace Tests\Database\Factories;

use Tests\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class CountryFactory
 * @package Test\Database\Factories
 */
class CountryFactory extends Factory
{
    /**
     * En: The name of the factory's corresponding model
     * Es: El nombre del modelo correspondiente de la fábrica
     * @var string
     */
    protected string $model = Country::class;

    /**
     * En: Define the model's default state
     * Es: Definir el estado por defecto del modelo
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }
}