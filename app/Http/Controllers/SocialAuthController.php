<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class SocialAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['oauth' => 'Google login failed.']);
        }

        return $this->handleSocialUser($googleUser, 'google');
    }

    // Common user handler
    protected function handleSocialUser($socialUser, $provider): RedirectResponse
    {
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user, true);

        session()->flash('success', 'Welcome, ' . $user->name . '! You have successfully signed in with ' . ucfirst($provider) . '.');

        return redirect()->intended('/dashboard');
    }
}
