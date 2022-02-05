<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Services\Builders\CustomerDataBuilder;
use Illuminate\Support\Collection;

class CustomersRepository
{
    /**
     * List/filter customers.
     *
     * @param string|null $country_code
     * @param string|null $is_phone_valid
     * @return Collection
     */
    public static function all(string $country_code = null, string $is_phone_valid = null): Collection
    {
        $customers = (new CustomerDataBuilder)->setData(Customer::get());

        if (isset($country_code)) {
            $customers = $customers->filterByCountryCode($country_code);
        }

        if (isset($is_phone_valid)) {
            $customers = $customers->filterByPhoneValidState($is_phone_valid);
        }

        return $customers->build();
    }
}
