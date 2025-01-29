<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Maker;
use App\Models\Model;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index');
    }
}
