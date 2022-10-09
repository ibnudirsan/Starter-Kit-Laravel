<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $birthDay = $this->faker->date('Y-m-d');
        return [
            'firstName'     => $this->faker->firstName(),
            'lastName'      => $this->faker->lastName(),
            'email'         => $this->faker->userName(). '@rumahdev.net',
            'birthDay'      => $birthDay,
            'age'           => Carbon::parse($birthDay)->age,
            'address'       => $this->faker->townState(),
            'numberPhone'   => "0811". rand(1293894, 9999999),
        ];
    }
}
