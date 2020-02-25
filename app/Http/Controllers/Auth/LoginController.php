<?php

namespace App\Http\Controllers\Auth;

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

    use AuthenticatesUsers {
        logout as oldLogout;
    }
    
    public function logout(Request $request)
    {
        $this->oldLogout($request);
        return redirect('/');
    }    

    /**
     * The path to the 'home' route for your application.
     *
     * @var string
     */
    //public const HOME = '/calculate';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = /*'/home';/*/RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
