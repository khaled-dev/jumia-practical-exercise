<?php

namespace App\Services\Builders;

use App\Models\Concerns\Collections\CustomersCollection;
use App\Services\DataTransferObjects\CustomerDTO;
use App\Services\PhoneNumberService;
use Illuminate\Support\Collection;

class CustomerDataBuilder
{

    /**
     * Collection of CustomerDTO.
     *
     * @var Collection
     */
    private $data;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->data = collect();
    }

    /**
     * Fill customer data do customer DTO.
     *
     * @param CustomersCollection $customerData
     * @return $this
     */
    public function setData(CustomersCollection $customerData): CustomerDataBuilder
    {
        $this->data = $customerData->map(function ($customer) {
            return (new CustomerDTO())
                ->setName($customer->name)
                ->setState(PhoneNumberService::validate($customer->phone))
                ->setCode(PhoneNumberService::getCode($customer->phone))
                ->setPhone(PhoneNumberService::getPhone($customer->phone));
        });

        return $this;
    }

    /**
     * Filter customer data by customer code.
     *
     * @param bool $code
     * @return $this
     */
    public function filterByCode(bool $code): CustomerDataBuilder
    {
        $this->data = $this->data->filter(function (CustomerDTO $customer) use($code) {
            return $customer->getCode() == $code;
        });

        return $this;
    }

    /**
     * Filter customer data by customer phone validation state
     *
     * @param bool $state
     * @return $this
     */
    public function filterByState(bool $state): CustomerDataBuilder
    {
        $this->data = $this->data->filter(function (CustomerDTO $customer) use($state) {
            return $customer->getState() == $state;
        });

        return $this;
    }

    /**
     * Build a collection of CustomerDTO's
     *
     * @return Collection
     */
    public function build(): Collection
    {
        return $this->data;
    }
}
