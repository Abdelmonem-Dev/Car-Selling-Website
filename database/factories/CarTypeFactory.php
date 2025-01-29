<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarType>
 */
class CarTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['sedan','SUV','Truck','Van','Coupe','Convertible','Wagon','Sports Car','Luxury Car','Hybrid/Electric','Diesel','Crossover','Hatchback','Minivan','Pickup Truck','Commercial','Off-Road','Performance','Classic'])
        ];
    }
}
