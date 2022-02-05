<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Repositories\CustomersRepository;
use Tests\Json\CustomersJsonResponse;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class CustomersTest extends TestCase
{
    use CustomersJsonResponse;

    /**
     * Number of item per page
     *
     * @var int
     */
    private $perPage = 3;

    /**
     * @test
     */
    public function itListsCustomers()
    {
        Customer::factory(6)->create();

        $customers = CustomersRepository::all();

        $this->getJson(route('customers.list'))
            ->assertOk()
            ->assertJsonStructure($this->listJsonResponse())
            ->assertJson(function (AssertableJson $json) use ($customers) {
                return $json->has('data')
                    ->has('meta')
                    ->has('links')
                    ->has('data.customers', $this->perPage)
                    ->has('data.customers.0', function ($json) use ($customers) {
                        return $json->where('name', $customers->first()->getName())
                            ->where('code', $customers->first()->getCode())
                            ->where('state', $customers->first()->getState())
                            ->where('phone', $customers->first()->getPhone())
                            ->etc();
                        }
                    );
            });
    }

    /**
     * @test
     */
    public function itFiltersCustomersByCounterCode()
    {
        Customer::factory(6)->create();

        $numberOfFoundItems = 1;
        $foundCustomer = CustomersRepository::find(
            Customer::factory()->create(['name' => 'jumia', 'phone' => '(123) 123456789'])->id
        );

        $this->getJson(route('customers.list', ['country_code' => '123']))
            ->assertOk()
            ->assertJsonStructure($this->listJsonResponse())
            ->assertJson(function (AssertableJson $json) use ($foundCustomer, $numberOfFoundItems) {
                return $json->has('data')
                    ->has('meta')
                    ->has('links')
                    ->has('data.customers', $numberOfFoundItems)
                    ->has('data.customers.6', function ($json) use ($foundCustomer) {
                        return $json->where('name', $foundCustomer->getName())
                            ->where('code', $foundCustomer->getCode())
                            ->where('state', $foundCustomer->getState())
                            ->where('phone', $foundCustomer->getPhone())
                            ->etc();
                        }
                    );
            });
    }

    /**
     * @test
     */
    public function itFiltersCustomersByPhoneValidation()
    {
        Customer::factory()->create(['name' => 'jumia_one with valid number', 'phone' => '(237) 699209115']);
        Customer::factory()->create(['name' => 'jumia_two with valid number', 'phone' => '(251) 914148181']);

        $numberOfFoundItems = 1;
        $foundCustomer = CustomersRepository::find(
            Customer::factory()->create(['name' => 'jumia', 'phone' => '(123) 123456789'])->id
        );

        $this->getJson(route('customers.list', ['is_phone_valid' => '0']))
            ->assertOk()
            ->assertJsonStructure($this->listJsonResponse())
            ->assertJson(function (AssertableJson $json) use ($foundCustomer, $numberOfFoundItems) {
                return $json->has('data')
                    ->has('meta')
                    ->has('links')
                    ->has('data.customers', $numberOfFoundItems)
                    ->has('data.customers.2', function ($json) use ($foundCustomer) {
                        return $json->where('name', $foundCustomer->getName())
                            ->where('code', $foundCustomer->getCode())
                            ->where('state', $foundCustomer->getState())
                            ->where('phone', $foundCustomer->getPhone())
                            ->etc();
                        }
                    );
            });
    }
}
