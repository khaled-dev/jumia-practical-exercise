<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\PhoneNumberService;

class PhoneNumberServiceTest extends TestCase
{
    /**
     * @test
     */
    public function itReturnsCountryCodeFromPhoneNumber()
    {
        $countryCode = PhoneNumberService::getCode('(251) 914148181');

        $this->assertEquals($countryCode, '251');
    }

    /**
     * @test
     */
    public function itValidatePhoneNumber()
    {
        $validation = PhoneNumberService::validate('(251) 914148181');
        $this->assertEquals($validation, true);

        $validation = PhoneNumberService::validate('(251) 1233123');
        $this->assertEquals($validation, false);

        $validation = PhoneNumberService::validate('(123) 1233123');
        $this->assertEquals($validation, false);
    }

    /**
     * @test
     */
    public function itReturnsOnlyTheNumberFromFullCodeAndPhoneNumber()
    {
        $phoneNumber = PhoneNumberService::getPhone('(251) 914148181');

        $this->assertEquals($phoneNumber, '914148181');
    }
}
