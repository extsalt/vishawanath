<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use Session;
 class SocialController extends Controller
 {
	public function redirect($provider)
	{
 		return Socialite::driver($provider)->redirect();
	}

    public function socialregister(){

        return view('auth.socialregister');
    }

    public function socialregisterpost(Request $request){


        $user = User::create([
            'name'     => Session::get('name'),
            'email'    => Session::get('email'),
            'provider' => Session::get('provider'),
            'provider_id' => Session::get('provider_id'),
            'gender' => $request->gender,
            'age' => $request->age,
            'country' => $request->country,
            'occupation' => $request->occupation,
            'password' => '12345678'
        ]);

        auth()->login($user);
        return redirect()->to('/home');

     }


	public function callback($provider)
	{
		try{

			$getInfo = Socialite::driver($provider)->user();

            Session::put('name', $getInfo->name);
            Session::put('email', $getInfo->email);
            Session::put('provider', $provider);
            Session::put('provider_id', $getInfo->id);


            $user = User::where('email', $getInfo->email)->first();
            if (!empty($user->email))
            {
                auth()->login($user);
                return redirect()->to('/home');

            }else{ return redirect()->to('/socialregister'); }


		}
		catch (\Exception $e)
		{
			Log::info('Error : '.$e->getMessage());
		}




    }




	function createUser($getInfo,$provider)
	{
		$user = User::where('email', $getInfo->email)->first();
		if (!$user)
		{
			$user = User::create([
			'name'     => $getInfo->name,
			'email'    => $getInfo->email,
			'provider' => $provider,
			'provider_id' => $getInfo->id
			]);
		}

		return $user;
	}
 }
