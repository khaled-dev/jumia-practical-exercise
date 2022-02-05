<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use App\Services\Builders\CustomerDataBuilder;
use App\Services\CollectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CustomerController extends Controller
{
    /**
     * Number of item per page
     *
     * @var int
     */
    private $perPage = 3;

    /**
     * List all customers.
     *
     * @param Request $request
     * @return CustomerCollection
     */
    public function index(Request $request): CustomerCollection
    {
        $customers = (new CustomerDataBuilder)->setData(Customer::get());

        if (isset($request->country_code)) {
            $customers = $customers->filterByCountryCode($request->country_code);
        }

        if (isset($request->is_phone_valid)) {
            $customers = $customers->filterByPhoneValidState($request->is_phone_valid);
        }

        return new CustomerCollection(
            CollectionService::paginate(
                $customers->build(), $this->perPage
            )
        );
    }
}
