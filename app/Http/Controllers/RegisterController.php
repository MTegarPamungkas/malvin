<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view("register.index", [
            "name" => "V-Blogs",
            "pageName" => "Register"
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);

        User::create($validatedData);

        $request->session()->flash('success', 'You are now registered ! Please Login.'); 

        return redirect("/login");
    }
}
