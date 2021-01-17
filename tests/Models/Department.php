<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Department
 * @package Tests\Models
 */
class Department extends Model
{
    use HasFactory;

    /**
     * En: The attributes that are mass assignable
     * Es: Los atributos que son asignables en masa
     * @var string[]
     */
    protected array $fillable = [
        "id", "name", "country_id"
    ];

    /**
     * En: One-to-one relationship with countries
     * Es: Relación uno a uno con países
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * En: Create a new factory instance for the model
     * Es: Crear una nueva instancia de fábrica para el modelo
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return DepartmentFactory::new();
    }
}
