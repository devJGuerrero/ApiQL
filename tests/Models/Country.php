<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * En: One-to-Many Relationship with Departments
     * Es: Relación uno a muchos con departamentos
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

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
