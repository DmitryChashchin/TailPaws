<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => 'Cat',
            'breed' => fake()->word(),
            'age' => fake()->numberBetween(1, 10),
            'weight' => fake()->numberBetween(1, 100),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'color' => fake()->word(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'status' => fake()->randomElement(['Available', 'Adopted']),
            'vaccinated' => fake()->boolean(),
            'pet_condition' => 'Healthy',
        ];
    }
}

