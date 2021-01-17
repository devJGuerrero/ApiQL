<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ResourcesTest
 * @package Tests\Feature
 */
class ResourcesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * En: Request default fields
     * Es: Solicitar campos por defecto
     * @return void
     */
    public function test_request_default_fields(): void
    {
        $response = $this->call("GET", "api/countries");
        $response
            ->assertOk()
            ->assertHeader("Content-type", "application/json")
            ->assertJsonStructure([
                "data" => [
                    "*" => [
                        "id",
                        "name",
                        "departments" => [
                            "*" => [
                                "id", "name", "createdAt", "updatedAt"
                            ]
                        ],
                        "createdAt",
                        "updatedAt"
                    ]
                ]
            ]);
    }

    /**
     * En: Request only id, name fields
     * Es: Solicitar solo campos id, nombre
     * @return void
     */
    public function test_request_only_id_name_fields(): void
    {
        $response = $this->call("GET", "api/countries", [
            "fields" => [
                "id"          => true,
                "name"        => true,
                "departments" => false,
                "createdAt"   => false,
                "updatedAt"   => false
            ]
        ]);
        $response
            ->assertOk()
            ->assertHeader("Content-type", "application/json")
            ->assertJsonStructure([
                "data" => [
                    ["id", "name"]
                ]
            ]);
    }

    /**
     * En: Request only id, name, departments fields
     * Es: Solicitar solo campos id, nombre, departamentos
     * @return void
     */
    public function test_request_only_id_name_departments_fields(): void
    {
        $response = $this->call("GET", "api/countries", [
            "fields" => [
                "id"          => true,
                "name"        => true,
                "departments" => [
                    "id"   => true,
                    "name" => true
                ],
                "createdAt"   => false,
                "updatedAt"   => false
            ]
        ]);
        $response
            ->assertOk()
            ->assertHeader("Content-type", "application/json")
            ->assertJsonStructure([
                "data" => [
                    ["id", "name", "departments"]
                ]
            ]);
    }
}