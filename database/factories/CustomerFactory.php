<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email'         => $this->faker->userName(). '@rumahdev.net',
            'firstName'     => $this->faker->firstName(),
            'lastName'      => $this->faker->lastName(),
            'address'       => $this->faker->townState(),
            'numberPhone'   => "0811". rand(1293894, 9999999),
        ];
    }
}
