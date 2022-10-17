<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
        // $this->middleware('guest');
    // }

    public function register(){
        return view('register');
    }

    // public function todoRegister(Request $request){
    //     $this->validate($request,[
    //         'name'      =>'required|min:6|max:30',
    //         'username'  =>'required|min:6|max:15|unique:users',
    //         'email'     =>'required|email|unique:users',
    //         'password'  =>'required|min:6|confirmed',
    //         'password_confirmation'=>'required|min:6',
    //     ]);

    //     User::create([
    //         'name'      => $request->name,
    //         'username'  => $request->username,
    //         'email'     => $request->email,
    //         'password'  => bcrypt($request->password),
    //         'is_admin'  => '0',
    //     ]);

    //     return redirect()->route('register')->with('success',"User ".$request->username." is Create successfully");
    // }

    public function profile(){
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.profile')->with('user',$user);
    }

    // public function todoRegister(Request $request){
    // }
}
