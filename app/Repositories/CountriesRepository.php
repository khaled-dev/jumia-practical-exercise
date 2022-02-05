<?php

namespace App\Repositories;

use App\Services\DataTransferObjects\CountryDTO;
use Illuminate\Support\Collection;

class CountriesRepository
{
    /**
     * List all available countries.
     *
     * @return Collection
     */
    public static function all(): Collection
    {
        return collect([
            ['code' => '237', 'name' => 'Cameroon'],
            ['code' => '251', 'name' => 'Ethiopia'],
            ['code' => '212', 'name' => 'Morocco'],
            ['code' => '258', 'name' => 'Mozambique'],
            ['code' => '256', 'name' => 'Uganda'],
        ])->map(function ($country) {
            return (new CountryDTO())->setCode($country['code'])->setName($country['name']);
        });
    }
}
