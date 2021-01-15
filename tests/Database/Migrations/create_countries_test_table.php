<?php

namespace Tests\Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCountriesTestTable
 * @package Tests\Database\Migrations
 */
class CreateCountriesTestTable extends Migration
{
    /**
     * En: Run the migrations
     * Es: Ejecutar las migraciones
     * @return void
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * En: Reverse the migrations
     * Es: Invertir las migraciones
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
}
