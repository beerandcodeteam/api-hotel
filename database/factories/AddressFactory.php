<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'zipcode' => fake()->numberBetween(10000000, 99999999),
            'city' => fake()->city,
            'state' => fake()->state,
            'street' => fake()->streetAddress,
            'district' => fake()->text,
            'number' => fake()->buildingNumber,
            'complement' => null
        ];
    }
}
