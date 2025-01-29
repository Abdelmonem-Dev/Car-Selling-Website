<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FuelType>
 */
class FuelTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Gasoline','Diesel','Electric','Hybrid','Natural Gas','Propane','Biodiesel','Ethanol','Methanol','Hydrogen','Flex-Fuel','Plug-In Hybrid','Fuel Cell'])
        ];
    }
}
