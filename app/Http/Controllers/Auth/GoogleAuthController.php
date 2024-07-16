<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleAuthController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        // dd(config('services.google'));

        try {
            $google_user = Socialite::driver('google')->user();

            // dd($google_user);
            $exist_user = User::where('google_id',  $google_user->getId())->first();
            // dd($exist_user);

            if (!$exist_user) {
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'status'=>'active'

                ]);

                Auth::login($new_user);
                return redirect()->route('admin.dashboard');
            } else {

                Auth::login($exist_user);
                return redirect()->route('admin.dashboard');
            }
        } catch (\Throwable $error) {
            dd('Something went wrong' . $error->getmessage());
        }
    }


    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
        dd('redirectFacebook');
    }

    public function callbackFacebook()
    {
        $facebook_user = Socialite::driver('google')->user();

        dd($facebook_user);
    }
}
