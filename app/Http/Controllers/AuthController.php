<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

public function authenticated(Request $request, $user)
{
    // Update the session record with the user_id
    DB::table('sessions')
        ->where('id', session()->getId())
        ->update(['user_id' => $user->id]);

    // Redirect the user after login
    return redirect()->intended('/dashboard');
}

    public function signup(SignupRequest $request){

         $validated = $request->validated();

        if(User::where('email', $validated['email'])->exists()){
            return redirect()->back()->with('error', 'This email is already registered');
        }

        $user = new User();
        $user->name = $validated['first_name'].' '.$validated['last_name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
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

    $user = User::where('email', $validated['email'])->first();
if($user->status === 0)
{
return redirect()->back()->with('error', 'Your account is not active. Please verify your email address.')->withInput();
}
    // Attempt to log in
    if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']],$remember)) {
        return redirect()->route('home')->with('success', 'Login successful!');
    } else {
        return redirect()->back()->with('error', 'Invalid login credentials.')->withInput();
    }
}

public function logout(Request $request)
{
    if (Auth::check()) {
        $userId = Auth::id();

        // Delete all user sessions from the database
        DB::table('sessions')->where('user_id', $userId)->delete();

        // Log out the user
        Auth::logout();

        // Clear and invalidate the session
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Explicitly expire the session cookies
        $cookie = cookie()->forget('laravel_session');
        $cookieXsrf = cookie()->forget('XSRF-TOKEN');

        // Redirect to login page with success message
        return redirect()->route('auth.login')
            ->withCookie($cookie)
            ->withCookie($cookieXsrf)
            ->with('success', 'Logged out successfully!');
    }

    return redirect()->route('auth.login');
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

        // Token is valid, show reset password form
        return view('auth.resetPassword', ['email' => $request->email])->with('success', 'Token is valid.');

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
