<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\State;
use App\Models\FuelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



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
    public function profile(){
        $user = auth()->user();
        return view('config.profile',['user' => $user]);
    }

    public function settings(){
        $user = auth()->user();
        return view('config.settings',['user' => $user]);
    }

    public function updateNamePhone(Request $request){
        $user = auth()->user();
        if($user->email === $request->email){
            $request->validate([
                'name' => 'required|string|max:200',
                'phone' => 'required|string|max:15|regex:/^[0-9]{10,15}$/'
            ]);
        }else{
            return redirect()->route('config.settings');
        }

        $user->name = request('name');
        $user->phone = request('phone');
        $user->save();
        return redirect()->route('config.profile');
    }

    public function updatePassword(Request $request){
        $user = auth()->user();
        if($user->email === $request->email){
            $request->validate([
                'password' => 'required|string|min:8|confirmed'
            ]);
            if(!password_verify(request('current_password'), $user->password)){
                return redirect()->route('config.settings');
            }
            if(password_verify(request('password'), $user->password)){
                return redirect()->route('config.settings');
            }
            if(request('password') !== request('password_confirmation')){
                return redirect()->route('config.settings');
            }
        }else{
            return redirect()->route('config.settings');
        }

        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect()->route('config.profile');
    }
    // In your controller (e.g., ProfileController.php)

    public function deleteAccount(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return view('auth.login');
        }

        $password = $request->input('password');

        // Verify the password
        if (!Hash::check($password, $user->password)) {
            return  view('config.settings');
        }

        // Delete the user account
        $user->deleted_at = now();
        $user->save();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
