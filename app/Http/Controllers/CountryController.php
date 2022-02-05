<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryCollection;
use App\Repositories\CountriesRepository;

class CountryController extends Controller
{
    /**
     * List all countries.
     *
     * @return CountryCollection
     */
    public function index(): CountryCollection
    {
        return new CountryCollection(CountriesRepository::all());
    }
}
