<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Tests\Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package Tests\Models
 */
class Country extends Model
{
    use HasFactory;

    /**
     * En: The attributes that are mass assignable
     * Es: Los atributos que son asignables en masa
     * @var string[]
     */
    protected array $fillable = [
        "id", "name"
    ];

    /**
     * En: Create a new factory instance for the model
     * Es: Crear una nueva instancia de fábrica para el modelo
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CountryFactory::new();
    }
}
