<?php

namespace Database\Factories;

use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Requests>
 */
class RequestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bloodGroup' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'bloodType' => fake()->randomElement(['Whole Blood', 'Plasma', 'Platelets']),
            'quantity' => fake()->numberBetween(100, 1000),
            'needByDate' => fake()->date(),
            'requestDate' => fake()->date(),
            'address' => fake()->address(),
        ];
    }
}
