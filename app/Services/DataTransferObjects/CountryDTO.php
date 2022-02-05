<?php

namespace App\Services\DataTransferObjects;

class CountryDTO
{
    /**
     *
     * @var string
     */
    protected $code;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     * Set country code
     *
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): CountryDTO
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get country code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set country name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): CountryDTO
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get country name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
