<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Rules\admin\blockMessage;
use App\Rules\admin\passwordRule;
use Illuminate\Http\JsonResponse;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }


    /**
     * Overwrite function validateLogin untuk recaptcha.
     */
    protected function validateLogin(Request $request) {
        $request->validate([
            $this->username()   => ['required','string'],
            'password'          => ['required', new passwordRule, 'string'],
            'captcha'           => ['required', 'captcha'],
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->route('login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> Captcha::img('flat')]);
    }    
}
