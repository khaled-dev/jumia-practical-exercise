<?php

namespace Tests\Unit\DTO;

use App\Services\DataTransferObjects\CountryDTO;
use PHPUnit\Framework\TestCase;

class CountryDTOTest extends TestCase
{
    /**
     * @test
     */
    public function itFillsNameAttributeWithTheGivenData()
    {
        $name = 'jumia';
        $country = (new CountryDTO())
            ->setName($name);

        $this->assertEquals($country->getName(), $name);
    }

    /**
     * @test
     */
    public function itFillsCodeAttributeWithTheGivenData()
    {
        $code = 'jumia';
        $country = (new CountryDTO())
            ->setCode($code);

        $this->assertEquals($country->getCode(), $code);
    }
}
