<?php

namespace Database\Seeders;

use App\Models\CarType;
use App\Models\FuelType;
use App\Models\State;
use App\Models\User;
use App\Models\Maker;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\City;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed Car Types
        $carTypes = [
            'Sedan', 'SUV', 'Truck', 'Van', 'Coupe', 'Convertible', 'Wagon', 'Hatchback', 'Crossover', 'Minivan',
            'Sports Car', 'Luxury Car', 'Electric Car', 'Hybrid Car', 'Diesel Car', 'Flex Fuel Car', 'Compressed Natural Gas Car',
            'Plug-In Hybrid Car', 'Autonomous Car', 'Concept Car', 'Kit Car', 'Replica Car', 'Restomod Car', 'Hot Rod',
            'Rat Rod', 'Lowrider', 'Muscle Car', 'Pony Car', 'Super Car', 'Hyper Car', 'Classic Car', 'Antique Car',
            'Vintage Car', 'Exotic Car'
        ];
        foreach ($carTypes as $type) {
            CarType::create(['name' => $type]);
        }

        // Seed Fuel Types
        $fuelTypes = [
            'Gasoline', 'Diesel', 'Electric', 'Hybrid', 'Natural Gas', 'Propane', 'Biodiesel', 'Ethanol', 'Methanol',
            'Hydrogen', 'Flex-Fuel', 'Plug-In Hybrid', 'Fuel Cell'
        ];
        foreach ($fuelTypes as $fuel) {
            FuelType::create(['name' => $fuel]);
        }

        // Seed States
        $states = [
            'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida',
            'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine',
            'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska',
            'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio',
            'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas',
            'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ];
        foreach ($states as $state) {
            State::create(['name' => $state]);
        }

        // Seed Cities
        $cities = [
            ['name' => 'New York', 'state_id' => 33],
            ['name' => 'Los Angeles', 'state_id' => 5],
            ['name' => 'Chicago', 'state_id' => 14],
            ['name' => 'Houston', 'state_id' => 44],
            ['name' => 'Phoenix', 'state_id' => 3],
            ['name' => 'Philadelphia', 'state_id' => 39],
            ['name' => 'San Antonio', 'state_id' => 44],
            ['name' => 'San Diego', 'state_id' => 5],
            ['name' => 'Dallas', 'state_id' => 44],
            ['name' => 'San Jose', 'state_id' => 5],
            ['name' => 'Austin', 'state_id' => 44],
            ['name' => 'Jacksonville', 'state_id' => 10],
            ['name' => 'Fort Worth', 'state_id' => 44],
            ['name' => 'Columbus', 'state_id' => 36],
            ['name' => 'San Francisco', 'state_id' => 5],
            ['name' => 'Charlotte', 'state_id' => 34],
            ['name' => 'Indianapolis', 'state_id' => 15],
            ['name' => 'Seattle', 'state_id' => 48],
            ['name' => 'Denver', 'state_id' => 6],
            ['name' => 'Washington', 'state_id' => 47],
            ['name' => 'Boston', 'state_id' => 22],
            ['name' => 'El Paso', 'state_id' => 44],
            ['name' => 'Nashville', 'state_id' => 43],
            ['name' => 'Detroit', 'state_id' => 23],
        ];
        foreach ($cities as $city) {
            City::create($city);
        }

        // Seed Makers
        $makers = [
            'Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'Bentley', 'BMW', 'Buick', 'Cadillac', 'Chevrolet', 'Chrysler',
            'Dodge', 'Ferrari', 'Fiat', 'Ford', 'Genesis', 'GMC', 'Honda', 'Hyundai', 'Infiniti', 'Jaguar', 'Jeep', 'Kia',
            'Lamborghini', 'Land Rover', 'Lexus', 'Lincoln', 'Lotus', 'Maserati', 'Mazda', 'McLaren', 'Mercedes-Benz',
            'MINI', 'Mitsubishi', 'Nissan', 'Porsche', 'Ram', 'Rolls-Royce', 'Saab', 'Subaru', 'Suzuki', 'Tesla', 'Toyota',
            'Volkswagen', 'Volvo'
        ];
        foreach ($makers as $maker) {
            Maker::create(['name' => $maker]);
        }

        // Seed Models
        $models = [
            'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q3', 'Q5', 'Q7', 'Q8', 'R8', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7', 'S3',
            'S4', 'S5', 'S6', 'S7', 'S8', 'SQ5', 'SQ7', 'TT', 'TTS', 'TT RS', 'A1', 'A2', 'Q2', 'Q4', 'Q6', 'Q1', 'RS Q3',
            'RS Q5', 'RS Q7', 'RS Q8', 'S1', 'S2', 'S4', 'S5', 'S6', 'S7'
        ];
        foreach ($models as $model) {
            Model::create([
                'name' => $model,
                'maker_id' => Maker::inRandomOrder()->first()->id
            ]);
        }

        // // Seed Users with Cars and Images
        // User::factory()
        //     ->count(5) // Create 5 users
        //     ->has(
        //         Car::factory()
        //             ->count(3) // Each user has 3 cars
        //             ->has(
        //                 CarImage::factory()
        //                     ->count(5) // Each car has 5 images
        //                     ->sequence(fn (Sequence $sequence) => ['position' => $sequence->index % 5 + 1]),
        //                 'images'
        //             )
        //             ->state([
        //                 'car_type_id' => CarType::inRandomOrder()->first()->id,
        //                 'fuel_type_id' => FuelType::inRandomOrder()->first()->id,
        //                 'city_id' => City::inRandomOrder()->first()->id,
        //                 'model_id' => Model::inRandomOrder()->first()->id,
        //                 'price' => $faker->numberBetween(5000, 50000),
        //                 'mileage' => $faker->numberBetween(1000, 100000),
        //                 'year' => $faker->numberBetween(2000, 2023),
        //                 'description' => $faker->paragraph,
        //             ]),
        //         'favouriteCars'
        //     )
        //     ->create();
    }
}
