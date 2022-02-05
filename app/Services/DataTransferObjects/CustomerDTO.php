<?php

namespace App\Services\DataTransferObjects;

class CustomerDTO
{
    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $code;

    /**
     *
     * @var bool
     */
    protected $state;

    /**
     *
     * @var string
     */
    protected $phone;


    /**
     * Set customer name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): CustomerDTO
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get customer name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set customer code
     *
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): CustomerDTO
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get customer code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set customer state
     *
     * @param bool $state
     * @return $this
     */
    public function setState(bool $state): CustomerDTO
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get customer state
     *
     * @return bool
     */
    public function getState(): bool
    {
        return $this->state;
    }

    /**
     * Set customer phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone): CustomerDTO
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get customer phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

}
