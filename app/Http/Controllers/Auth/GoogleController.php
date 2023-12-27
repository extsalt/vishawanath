<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Session;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('provider_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/home');

            }else{

                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'password' => encrypt('Superman_test')
                // ]);

                    $user = User::where('email', $getInfo->email)->first();
                    if (empty($user->email))
                    {
                        Session::put('name', $user->name);
                        Session::put('email', $user->email);
                        Session::put('provider', 'google');
                        Session::put('provider_id',$user->id);

                        return redirect('/socialregister');

                    }else{

                        Auth::login($user);
                        return redirect('/home');
                    }

            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
