<?php

namespace App\Http\Controllers\Auth\Google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\User;

class MainController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handlegoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $find = User::where('google_id', $user->id)->first();

            if (!$find) {
                $users = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => Hash::make($user->email),
                ]);

                Auth::login($users);

                return redirect('home');
            } else { 
                Auth::login($find);

                return redirect('home');
            }

        } catch(Exception $x) {
            dd($x->getMessage());
        }
    }
}
