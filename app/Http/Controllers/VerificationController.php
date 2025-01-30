<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Mail\PasswordResetMail;

class VerificationController extends Controller
{
    public function addEmailVerify($email){
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Generate a secure token
        $token = Str::random(12);

        // Insert the token into the password_reset_tokens table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],  // Ensure the email value is passed correctly
            ['token' => $token, 'created_at' => now()]
        );

        $verificationLink = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60), // You can set the expiration time as you like
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

            // Send the email
            Mail::to($email)->send(new VerifyEmailMail($user, $verificationLink));

        return view('auth.verifyEmail',['email' => $email]);
    }


    public function resendToken(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        if($user->hasVerifiedEmail()){
            return redirect()->route('home')->with('message', 'Email already verified.');
        }

        // Generate a secure token
        $token = Str::random(12);

        // Insert the token into the password_reset_tokens table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],  // Ensure the email value is passed correctly
            ['token' => $token, 'created_at' => now()]
        );

        $verificationLink = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60), // You can set the expiration time as you like
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        try {
            // Send the email
            Mail::to($email)->send(new VerifyEmailMail($user, $verificationLink));

                 // JSON response with success
                 return redirect()->route('auth.verifyEmail')->with('message', 'Verification email sent successfully.');
    } catch (\Exception $e) {
        Log::error('Email sending failed: ' . $e->getMessage());
        return redirect()->route('auth.verifyEmail',[$user->email])->with('message', 'Failed to send verification email. Please try again later.');
    }

    }

    public function verify($id, $hash)
    {
        $user = User::find($id);

        if (!$user || !hash_equals(sha1($user->email), $hash)) {
            abort(403, 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home')->with('message', 'Email already verified.');
        }

        $user->markEmailAsVerified();

        return redirect()->route('home')->with('message', 'Email successfully verified.');
    }


public function addTokenForm($email){
    return view('auth.addToken',['email' => $email]);
}




    public function forgotPassword(Request $request)
{
    // Validate the email
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);
    $email = $request->input('email');  // Get the email from the form

    // Generate a secure token
    $token = bin2hex(random_bytes(6));

    // Insert the token into the password_reset_tokens table
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $email],  // Ensure the email value is passed correctly
        ['token' => $token, 'created_at' => now()]
    );

    // Send the password reset email
    Mail::to($email)->send(new PasswordResetMail($token));

    return redirect()->route('auth.addToken',['email' => $email])->with('success', 'Password reset Code sent to your email.');
}

}
