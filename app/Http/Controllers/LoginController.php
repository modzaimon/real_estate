<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('login');
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
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
