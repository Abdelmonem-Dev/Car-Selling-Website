<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Car;


class FavoriteController extends Controller
{
    public function toggle($carId)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'User not logged in.'], 401);
        }

        $user = Auth::user();
        $car = Car::findOrFail($carId);

        // Check if the user has already favorited the car
        if ($user->favouriteCars()->where('car_id', $carId)->exists()) {
            $user->favouriteCars()->detach($carId);
            return response()->json(['success' => true, 'message' => 'Car removed from favorites.']);
        } else {
            $user->favouriteCars()->attach($carId);
            return response()->json(['success' => true, 'message' => 'Car added to favorites.']);
        }
    }
}
