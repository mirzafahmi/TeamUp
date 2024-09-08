<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\UserProvider;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    // Redirect to the OAuth provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle the OAuth provider callback
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['message' => 'Login with ' . ucfirst($provider) . ' failed. Please try again.']);
        }

        // Find if the provider is already linked
        $userProvider = UserProvider::where('provider_id', $socialUser->getId())
                                    ->where('provider', $provider)
                                    ->first();

        if ($userProvider) {
            // If the provider is already linked, log the user in
            $user = $userProvider->user;
            $message = 'Logged in successfully!';
        } else {
            // If the provider is not linked, check if the user already exists by email
            $user = User::where('email', $socialUser->getEmail())->first();
            
            if (!$user) {
                // Create a new user if none exists

                // Generate a unique username
                $username = $socialUser->getNickname() ?? transformName($socialUser->getName());
                $originalUsername = $username;
                $counter = 1;

                // Check if the username is taken and append a number if necessary
                while (User::where('username', $username)->exists()) {
                    $username = $originalUsername . $counter;
                    $counter++;
                }

                $user = User::create([
                    'name' => $socialUser->getName(),
                    'username' => $username,
                    'email' => $socialUser->getEmail(),
                    'password' => null, // No password for OAuth users
                    'image' => $socialUser->getAvatar() ?? null,
                ]);
            }

            // Link the provider to the user
            $user->providers()->create([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken ?? null,
            ]);
            
            $message = 'Account linked successfully!';

            event(new Registered($user));
        }

        // Log the user in
        Auth::login($user);

        return redirect()->route('index')->with('success', $message);
    }
}

