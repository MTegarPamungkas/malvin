<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("login.index", [
            "name" => "V-Blogs",
            "pageName" => "Login"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => "email:dns|required",
            "password" => "required"
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->with("loginFailed", "Login Failed !");
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
