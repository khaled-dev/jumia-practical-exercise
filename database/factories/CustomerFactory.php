<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phoneNumbers = [
            '(237) 699209115',
            '(251) 914148181',
            '(256) 714660221',
            '(256) 3142345678',
            '(258) 849181828',
        ];

        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->randomElement($phoneNumbers),
        ];
    }
}
