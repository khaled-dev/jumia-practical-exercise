<?php

namespace Tests\Unit;

use App\Models\Concerns\Collections\CustomersCollection;
use App\Models\Customer;
use App\Services\Builders\CustomerDataBuilder;
use PHPUnit\Framework\TestCase;

class CustomerDataBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function itBuildsCustomerDataTransferObject()
    {
        // initialize collection of customers
        $customer = (new Customer());
        $customer->name = 'jumia_one';
        $customer->phone = '(237) 699209115';
        $customers = new CustomersCollection(['customer' => $customer]);

        // build customer data transfer object
        $customerDTO = (new CustomerDataBuilder())->setData($customers)->build();

        $this->assertEquals($customerDTO->first()->getName(), 'jumia_one');
        $this->assertEquals($customerDTO->first()->getState(), true);
        $this->assertEquals($customerDTO->first()->getCode(), '237');
        $this->assertEquals($customerDTO->first()->getPhone(), '699209115');
    }
}
