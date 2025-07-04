<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function UserSingupShow(){
        return view('user.user-signup');
    }


    public function UserRegisterPost(Request $request){
            $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:3'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password)
            ]);
            Auth::login($user);
            return redirect()->route('login.view')->with("success", 'Now You can login');
    }

    public function UserLoginPage(){
        return view('user.user-login');
    }

    public function UserLoginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);
        if(Auth::attempt([
            "email" => $request->email,
            "password"=> $request->password 
        ])){
            return redirect()->route('product.list')->with("Success", "User logged in successfully");
        } else {
            return back()->with("error", "Username or password are wrong");
        }
    }

    public function UserAccount(){
        return view('user.user-accout');
    }

    public function UserProfileShow(){
        return view('user.user-profile');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login.view');
    }
}
