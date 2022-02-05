<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerCollection;
use App\Repositories\CustomersRepository;
use App\Services\CollectionService;
use Illuminate\Http\Request;

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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(Request $request): CustomerCollection
    {
        return new CustomerCollection(
            CollectionService::paginate(
                CustomersRepository::all($request->country_code, $request->is_phone_valid), $this->perPage
            )
        );
    }
}
