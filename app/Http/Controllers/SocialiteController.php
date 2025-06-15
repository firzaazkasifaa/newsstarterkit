<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            // Logic untuk menyimpan/update user
            $authUser = User::updateOrCreate([
                'email' => $user->email,
            ], [
                'name' => $user->name,
                'provider_id' => $user->id,
                'provider' => 'google',
            ]);
            
            Auth::login($authUser);
            
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Login with Google failed!');
        }
    }
}