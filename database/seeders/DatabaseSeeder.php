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
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'SUV'],
                ['name' => 'Truck'],
                ['name' => 'Van'],
                ['name' => 'Coupe'],
                ['name' => 'Convertible'],
                ['name' => 'Wagon'],
                ['name' => 'Hatchback'],
                ['name' => 'Crossover'],
                ['name' => 'Minivan'],
                ['name' => 'Sports Car'],
                ['name' => 'Luxury Car'],
                ['name' => 'Electric Car'],
                ['name' => 'Hybrid Car'],
                ['name' => 'Diesel Car'],
                ['name' => 'Flex Fuel Car'],
                ['name' => 'Compressed Natural Gas Car'],
                ['name' => 'Plug-In Hybrid Car'],
                ['name' => 'Autonomous Car'],
                ['name' => 'Concept Car'],
                ['name' => 'Kit Car'],
                ['name' => 'Replica Car'],
                ['name' => 'Restomod Car'],
                ['name' => 'Hot Rod'],
                ['name' => 'Rat Rod'],
                ['name' => 'Lowrider'],
                ['name' => 'Muscle Car'],
                ['name' => 'Pony Car'],
                ['name' => 'Super Car'],
                ['name' => 'Hyper Car'],
                ['name' => 'Classic Car'],
                ['name' => 'Antique Car'],
                ['name' => 'Vintage Car'],
                ['name' => 'Exotic Car']
                )
                ->count(31)
                ->create();

                FuelType::factory()
                    ->sequence(
                        ['name' => 'Gasoline'],
                        ['name' => 'Diesel'],
                        ['name' => 'Electric'],
                        ['name' => 'Hybrid'],
                        ['name' => 'Natural Gas'],
                        ['name' => 'Propane'],
                        ['name' => 'Biodiesel'],
                        ['name' => 'Ethanol'],
                        ['name' => 'Methanol'],
                        ['name' => 'Hydrogen'],
                        ['name' => 'Flex-Fuel'],
                        ['name' => 'Plug-In Hybrid'],
                        ['name' => 'Fuel Cell']
                    )
                    ->count(13)
                    ->create();

                    State::factory()
                        ->sequence(
                            ['name' => 'Alabama'],
                            ['name' => 'Alaska'],
                            ['name' => 'Arizona'],
                            ['name' => 'Arkansas'],
                            ['name' => 'California'],
                            ['name' => 'Colorado'],
                            ['name' => 'Connecticut'],
                            ['name' => 'Delaware'],
                            ['name' => 'Florida'],
                            ['name' => 'Georgia'],
                            ['name' => 'Hawaii'],
                            ['name' => 'Idaho'],
                            ['name' => 'Illinois'],
                            ['name' => 'Indiana'],
                            ['name' => 'Iowa'],
                            ['name' => 'Kansas'],
                            ['name' => 'Kentucky'],
                            ['name' => 'Louisiana'],
                            ['name' => 'Maine'],
                            ['name' => 'Maryland'],
                            ['name' => 'Massachusetts'],
                            ['name' => 'Michigan'],
                            ['name' => 'Minnesota'],
                            ['name' => 'Mississippi'],
                            ['name' => 'Missouri'],
                            ['name' => 'Montana'],
                            ['name' => 'Nebraska'],
                            ['name' => 'Nevada'],
                            ['name' => 'New Hampshire'],
                            ['name' => 'New Jersey'],
                            ['name' => 'New Mexico'],
                            ['name' => 'New York'],
                            ['name' => 'North Carolina'],
                            ['name' => 'North Dakota'],
                            ['name' => 'Ohio'],
                            ['name' => 'Oklahoma'],
                            ['name' => 'Oregon'],
                            ['name' => 'Pennsylvania'],
                            ['name' => 'Rhode Island'],
                            ['name' => 'South Carolina'],
                            ['name' => 'South Dakota'],
                            ['name' => 'Tennessee'],
                            ['name' => 'Texas'],
                            ['name' => 'Utah'],
                            ['name' => 'Vermont'],
                            ['name' => 'Virginia'],
                            ['name' => 'Washington'],
                            ['name' => 'West Virginia'],
                            ['name' => 'Wisconsin'],
                            ['name' => 'Wyoming']
                        )
                        ->count(50)
                        ->create();

                        City::factory()
                            ->sequence(
                                ['name' => 'New York',
                                'state_id' => 1],
                                ['name' => 'Los Angeles',
                                'state_id' => 5],
                                ['name' => 'Chicago',
                                'state_id' => 13],
                                ['name' => 'Houston',
                                'state_id' => 43],
                                ['name' => 'Phoenix',
                                'state_id' => 3],
                                ['name' => 'Philadelphia',
                                'state_id' => 39],
                                ['name' => 'San Antonio',
                                'state_id' => 43],
                                ['name' => 'San Diego',
                                'state_id' => 5],
                                ['name' => 'Dallas',
                                'state_id' => 43],
                                ['name' => 'San Jose',
                                'state_id' => 5],
                                ['name' => 'Austin',
                                'state_id' => 43],
                                ['name' => 'Jacksonville',
                                'state_id' => 43],
                                ['name' => 'Fort Worth',
                                'state_id' => 43],
                                ['name' => 'Columbus',
                                'state_id' => 37],
                                ['name' => 'San Francisco',
                                'state_id' => 5],
                                ['name' => 'Charlotte',
                                'state_id' => 37],
                                ['name' => 'Indianapolis',
                                'state_id' => 14],
                                ['name' => 'Seattle',
                                'state_id' => 47],
                                ['name' => 'Denver',
                                'state_id' => 6],
                                ['name' => 'Washington',
                                'state_id' => 38],
                                ['name' => 'Boston',
                                'state_id' => 21],
                                ['name' => 'El Paso',
                                'state_id' => 43],
                                ['name' => 'Nashville',
                                'state_id' => 43],
                                ['name' => 'Detroit',
                                'state_id' => 22],
                            )
                            ->count(24)
                            ->create();
                            Maker::factory()
                            ->sequence(
                                ['name' => 'Acura'],
                                ['name' => 'Alfa Romeo'],
                                ['name' => 'Aston Martin'],
                                ['name' => 'Audi'],
                                ['name' => 'Bentley'],
                                ['name' => 'BMW'],
                                ['name' => 'Buick'],
                                ['name' => 'Cadillac'],
                                ['name' => 'Chevrolet'],
                                ['name' => 'Chrysler'],
                                ['name' => 'Dodge'],
                                ['name' => 'Ferrari'],
                                ['name' => 'Fiat'],
                                ['name' => 'Ford'],
                                ['name' => 'Genesis'],
                                ['name' => 'GMC'],
                                ['name' => 'Honda'],
                                ['name' => 'Hyundai'],
                                ['name' => 'Infiniti'],
                                ['name' => 'Jaguar'],
                                ['name' => 'Jeep'],
                                ['name' => 'Kia'],
                                ['name' => 'Lamborghini'],
                                ['name' => 'Land Rover'],
                                ['name' => 'Lexus'],
                                ['name' => 'Lincoln'],
                                ['name' => 'Lotus'],
                                ['name' => 'Maserati'],
                                ['name' => 'Mazda'],
                                ['name' => 'McLaren'],
                                ['name' => 'Mercedes-Benz'],
                                ['name' => 'MINI'],
                                ['name' => 'Mitsubishi'],
                                ['name' => 'Nissan'],
                                ['name' => 'Porsche'],
                                ['name' => 'Ram'],
                                ['name' => 'Rolls-Royce'],
                                ['name' => 'Saab'],
                                ['name' => 'Subaru'],
                                ['name' => 'Suzuki'],
                                ['name' => 'Tesla'],
                                ['name' => 'Toyota'],
                                ['name' => 'Volkswagen'],
                                ['name' => 'Volvo']
                            )
                            ->count(45)
                            ->create();

                        Model::factory()
                            ->sequence(
                                ['name' => 'A3', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A4', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A6', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A8', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q3', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q8', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'R8', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS3', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS4', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS6', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S3', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S4', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S6', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S8', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'SQ5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'SQ7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'TT', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'TTS', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'TT RS', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A1', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'A2', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q2', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q4', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q6', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'Q1', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS Q3', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS Q5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS Q7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'RS Q8', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S1', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S2', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S4', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S5', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S6', 'maker_id' => Maker::inRandomOrder()->first()->id],
                                ['name' => 'S7', 'maker_id' => Maker::inRandomOrder()->first()->id],
                            )
                            ->count(43)
                            ->create();


                                User::factory()
                                    ->count(3)
                                    ->create();
                            User::factory()
                                ->count(2)
                                ->has(
                                    Car::factory()
                                        ->count(5)
                                        ->has(
                                            CarImage::factory()
                                            ->count(5)
                                            ->sequence( fn (Sequence $sequence) =>
                                            ['position' => $sequence->index % 5 + 1]),
                                            'images'
                                        )->hasFeatures(),
                                        'favouriteCars'
                                )
                                ->create();


    }
}
