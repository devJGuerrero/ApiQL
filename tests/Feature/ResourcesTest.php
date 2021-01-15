<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Database\Seeds\CountrySeeder;

/**
 * Class ResourcesTest
 * @package Tests\Feature
 */
class ResourcesTest extends TestCase
{
    public function test_init()
    {
        $this->seed(CountrySeeder::class);
        $this->assertTrue(true);
    }
}