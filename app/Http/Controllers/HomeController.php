<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\State;
use App\Models\FuelType;


class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with(['primaryImage','city','maker','model','fuelType','carType','favouredUsers'])
            ->orderBy('published_at', 'desc')
            ->limit(30)

            ->get();

            $makers = Maker::all();
            $states = State::all();
            $fuelTypes = FuelType::all();
            $carTypes = CarType::all();

        return view('home.index',['cars' => $cars, 'makers' => $makers, 'states' => $states, 'fuelTypes' => $fuelTypes, 'carTypes' => $carTypes]);
    }
}
