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
     * @return CustomerCollection
     */
    public function index(): CustomerCollection
    {
        return new CustomerCollection(
            CollectionService::paginate(
                (new CustomerDataBuilder)->setData(Customer::get())->build()
                , $this->perPage
            )
        );
    }
}
