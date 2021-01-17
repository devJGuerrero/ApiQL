<?php

namespace Tests\Database\Factories;

use Tests\Models\Country;
use Tests\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DepartmentFactory
 * @package Tests\Database\Factories
 */
class DepartmentFactory extends Factory
{
    /**
     * En: The name of the factory's corresponding model
     * Es: El nombre del modelo correspondiente de la fábrica
     * @var string
     */
    protected string $model = Department::class;

    /**
     * En: Define the model's default state
     * Es: Definir el estado por defecto del modelo
     * @return array
     */
    public function definition(): array
    {
        return [
            "name"       => $this->faker->name,
            "country_id" => Country::factory()
        ];
    }
}