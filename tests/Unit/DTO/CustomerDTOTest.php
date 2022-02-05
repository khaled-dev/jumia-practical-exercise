<?php

namespace Tests\Unit\DTO;

use App\Services\DataTransferObjects\CustomerDTO;
use PHPUnit\Framework\TestCase;

class CustomerDTOTest extends TestCase
{
    /**
     * @test
     */
    public function itFillsNameAttributeWithTheGivenData()
    {
        $name = 'jumia';
        $customer = (new CustomerDTO())
            ->setName($name);

        $this->assertEquals($customer->getName(), $name);
    }

    /**
     * @test
     */
    public function itFillsCodeAttributeWithTheGivenData()
    {
        $code = 'jumia';
        $customer = (new CustomerDTO())
            ->setCode($code);

        $this->assertEquals($customer->getCode(), $code);
    }

    /**
     * @test
     */
    public function itFillsStateAttributeWithTheGivenData()
    {
        // it takes 0|1 and returns false|true
        $state = '0';
        $customer = (new CustomerDTO())
            ->setState($state);

        $this->assertEquals($customer->getState(), false);
    }

    /**
     * @test
     */
    public function itFillsPhoneAttributeWithTheGivenData()
    {
        $phone = 'jumia';
        $customer = (new CustomerDTO())
            ->setPhone($phone);

        $this->assertEquals($customer->getPhone(), $phone);
    }
}
