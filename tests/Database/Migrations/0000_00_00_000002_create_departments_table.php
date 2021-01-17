<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDepartmentsTable
 */
class CreateDepartmentsTable extends Migration
{
    /**
     * En: Run the migrations
     * Es: Ejecutar las migraciones
     * @return void
     */
    public function up(): void
    {
        Schema::create("departments", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")->references("id")->on("countries");
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
        Schema::dropIfExists("departments");
    }
}
