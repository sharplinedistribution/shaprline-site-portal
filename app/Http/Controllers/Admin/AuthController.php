<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        if(auth()->guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin_login');
    }
    public function login(Request $request){
        $credentials = request()->only('email', 'password');
        if (auth()->guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.dashboard')->with('success','Logged in');
        }
        return redirect()->route('admin.login')->with('Error','Invalid Email or Password');
    }
}
