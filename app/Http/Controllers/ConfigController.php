<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\State;
use App\Models\FuelType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{

    public function profile(){
        $user = auth()->user();
        if (!$user) {
            return view('auth.login');
        }
        return view('config.profile',['user' => $user]);
    }

    public function settings(){
        $user = auth()->user();
        if (!$user) {
            return view('auth.login');
        }
        return view('config.settings',['user' => $user]);
    }

    public function updateNamePhone(Request $request){

        $user = auth()->user();
        if (!$user) {
            return view('auth.login');
        }

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
        if (!$user) {
            return view('auth.login');
        }
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

    public function updateProfileImage(Request $request) {
        if (Auth::user() === null) {
            return view('auth.login');
        }
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            Auth::user()->profile_photo_path = $imagePath;
            Auth::user()->save();
            return response()->json(['message' => 'Profile image updated successfully', 'image_path' => $imagePath]);
        }

        return response()->json(['message' => 'No image uploaded'], 400);
    }


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
