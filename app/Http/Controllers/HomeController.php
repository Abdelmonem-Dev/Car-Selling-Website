<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $car = Car::find(2);
        $user = User::find(1);
        dd($user->favouriteCars);

        return view('home.index');
    }
}
