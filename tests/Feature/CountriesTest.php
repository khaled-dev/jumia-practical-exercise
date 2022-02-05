<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Repositories\CountriesRepository;
use Tests\Json\CountriesJsonResponse;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class CountriesTest extends TestCase
{
    use CountriesJsonResponse;

    /**
     * @test
     */
    public function itListsCountries()
    {
        Customer::factory(5)->create();

        $countries = CountriesRepository::all();

        $this->getJson(route('countries.list'))
            ->assertOk()
            ->assertJsonStructure($this->listJsonResponse())
            ->assertJson(function (AssertableJson $json) use ($countries) {
                return $json->has('data')
                    ->has('data.countries', $countries->count())
                    ->has('data.countries.0', function ($json) use ($countries) {
                        return $json->where('code', $countries->first()->getCode())
                            ->where('name', $countries->first()->getName())
                            ->etc();
                        }
                    );
            });
    }
}
