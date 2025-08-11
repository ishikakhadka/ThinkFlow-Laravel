<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store()
    {

        $validated = request()->validate([
            "name" => "required|min:3|max:240",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",

        ]);

       $user= User::create([
            "name" => $validated['name'],
            'email' => $validated['email'],
            'password' =>Hash::make( $validated['password']),
            "bio" => "",
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));
        return redirect()->route('dashboard')->with('success', "User created successfully");
    }
    public function login()
    {
        return view("auth.login");
    }

    public function Authenticate()
    {
        $validated = request()->validate([

            "email" => "required|email",
            "password" => "required|min:8",
        ]);

    if( auth()->attempt($validated)){
        request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', "User logged in successfully.");
    }
        return redirect()->route('login')->withErrors(["No users found with provided email and password"]);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->route('dashboard')->with('success', "User logged out successfully.");
    }
}
