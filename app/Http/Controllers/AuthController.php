<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Utils\MapCreatorUtils;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        if (auth()->check()){
            return redirect('/home');
        }
        return view('welcome');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if(auth()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->has('remember-me'))) {
            $request->session()->regenerate();

            return MapCreatorUtils::requestToken();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * @throws RequestException
     */
    public function getAccessToken(Request $request) : RedirectResponse {
        $payload = [
            'grant_type' => 'authorization_code',
            'client_id' => config('map-creator.client_id'),
            'client_secret' => config('map-creator.client_secret'),
            'redirect_uri' => route('getAccessToken'),
            'code' => $request->get('code')
        ];

        $response = MapCreatorUtils::makeCall('/oauth/token', 'post', $payload, false, true);

        $request->session()->put(MapCreatorUtils::ACCESS_TOKEN_KEY, $response->json()['access_token']);
        return redirect('/home');
    }
}
