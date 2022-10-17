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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  

    public function Username(){
        return 'username';
    }

    public function todoLogin(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['username'=>$request->username,'password'=> $request->password])){
            return redirect()->route('dashboard')->with('success',"Welcome {{$request->username}}");
        }else{
            return redirect()->route('login')->with('error',"Username or password are Wrong! Try login again.");
        }
    }
    
}
