<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function signup(SignupRequest $request){

         $validated = $request->validated();

        if(User::where('email', $validated['email'])->exists()){
            return redirect()->back()->with('error', 'This email is already registered');
        }

        $user = new User();
        $user->name = $validated['first_name'].' '.$validated['last_name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->phone = $validated['phone'];
        $user->save();

        if($user){
            Auth::login($user);
                return redirect()->route('auth.verifyEmail',['email' => $request->email])->with('success', 'Account created successfully');

            }else{
                return redirect()->back()->with('error', 'An error occurred while creating your account');
            }
    }
    public function login(LoginRequest $request)
{
    $validated = $request->validated();
    $remember = $request->has('remember');

    // Check if the email exists
    if (!User::where('email', $validated['email'])->exists()) {
        return redirect()->back()->with('email', 'email or password wrong.')->withInput();
    }



    // Attempt to log in
    if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']],$remember)) {
        return redirect()->route('home')->with('success', 'Login successful!');
    } else {
        return redirect()->back()->with('error', 'Invalid login credentials.')->withInput();
    }
}

public function logout()
{
    // Auth::logoutOtherDevices(request('password'));
    Auth::logout();
    return redirect()->route('auth.login')->with('success', 'Logout successful!');
}


public function checkToken(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'token' => 'required|string|exists:password_reset_tokens,token',
    ]);
    // Retrieve the token record from the database

    $tokenRecord = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

if($tokenRecord){
        if ($tokenRecord->token === $request->token) {
        // Token is valid, show reset password form
        return view('auth.resetPassword', ['email' => $request->email])->with('success', 'Token is valid.');
    } else {
        // Token is invalid or expired
        return redirect()->back()->with('error', 'Invalid or expired token.');
    }
}else{
    return redirect()->back()->with('error', 'Invalid or expired token.');
}
}
    public static function resetPassword(Request $request){
         // Validate the new password
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Update the user's password
    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();
    if($user){
            // Delete the token record
    DB::table('password_reset_tokens')
    ->where('email', $request->email)
    ->delete();

        return redirect()->route('auth.login')->with('success', 'Password reset successful. Please login with your new password.');

    }else{
        return redirect()->back()->with('error', 'An error occurred while resetting your password.');
    }
    }
}
