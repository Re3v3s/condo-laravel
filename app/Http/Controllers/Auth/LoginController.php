<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use App\User;
use Session;
use Redirect;
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
    // use AuthenticatesUsers {
    //     logout as performLogout;
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // protected function authenticated(Request $request, User $user)
    // {

    //     return redirect("/");
    // }

    // public function logout(Request $request)
    // {
    //     $this->performLogout($request);
    //     return redirect()->route('/login');
    // }

    public function testlogin()
    {
        return view('condo.index');
    }
    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::logout();
        Session::flush(); //ลบ session ทั้งหมด
        return Redirect::to('/login'); //กลับไปหน้า login
    }
}
