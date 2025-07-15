<?php

namespace App\Http\Controllers;

use App\Models\Panel;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function SignUpShow(){
        return view('pannel.signup-pannel');
    }

    public function loginShow(){
        return view('pannel.login-panel');
    }

    public function SignupPost(Request $request){
        $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:panels,email',
        'password' => 'required|min:2',
        ]);
        $panel = Panel::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        Auth::guard('panel')->login($panel);
        return redirect()->route('show.login')->with('success', 'you can login now');
    }
    
    public function LoginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::guard('panel')->attempt($credentials)){
            return redirect()->intended(route('admin_view_dashboard'));
        } 
         return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput();
    }

    public function logoutPanel(Request $request){
        Auth::guard('panel')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('show.login')->with('Logout', 'You have been successfully logged out');
    }
}
