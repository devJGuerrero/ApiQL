<?php

namespace Tests\Http\Controllers;

use Tests\Models\Country;
use Illuminate\Routing\Controller;
use Tests\Http\Resources\CountryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class CountriesController
 * @package Tests\Http\Controllers
 */
class CountriesController extends Controller
{
    /**
     * En: Get a list of all available resources
     * Es: Obtener una lista de todos los recursos disponibles
     * @param Country $country
     * @return AnonymousResourceCollection
     */
    public function find(Country $country): AnonymousResourceCollection
    {
        return CountryResource::collection($country->all());
    }
}