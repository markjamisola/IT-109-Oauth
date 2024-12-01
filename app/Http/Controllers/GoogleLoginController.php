<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class GoogleLoginController extends Controller
{
    // Redirect to Google for authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google callback and store user data in the session
    public function handleGoogleCallback()
    {
        try {
            // Get the user info from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Store user data in the session
            session(['user' => $googleUser]);

            // Redirect to home route
            return redirect()->route('home');
        } catch (\Exception $e) {
            // Handle errors (e.g., log the error and redirect to login with a message)
            return redirect()->route('google.redirect')->with('error', 'Failed to log in with Google.');
        }
    }
}

