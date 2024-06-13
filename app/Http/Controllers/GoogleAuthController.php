<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {
       
            $google_user = Socialite::driver('google')->stateless()->user();
    
            $user = User::updateOrCreate([
                'google_id' =>  $google_user->id,
            ], [
                'name' => $google_user->name,
                'email' =>  $google_user->email,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
    }
}