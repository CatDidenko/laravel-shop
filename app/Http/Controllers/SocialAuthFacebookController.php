<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use Auth;

use App\Services\SocialFacebookAccountService;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAuthFacebookController extends Controller
{

    public function redirect()
    {

        return Socialite::driver('facebook')->redirect();
    }


    public function callback(SocialFacebookAccountService $service, Request $request)
    {
        if (! $request->input('code')) {
        return redirect('login')->withErrors('Login failed: '.$request->input('error').' - '.$request->input('error_reason'));

    }
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/');
    }
}
