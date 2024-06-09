<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register()
    {
        return view('user.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|min:6|max:20|unique:users',
            'password' => 'min:6|max:20|required_with:cf-password|same:cf-password',
            'cf-password' => 'same:password',
        ]);

        $dataRegister = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '2',
            'status' => '1',
        ];

        if (User::create($dataRegister)) {
            return redirect()->back()->with('success', 'Register success, please login');
        } else {
            return redirect()->back()->with('error', 'Register failed, please try again');
        }
    }

    function login()
    {
        return view('user.login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        if(auth()->attempt($request->only('email', 'password'))){
            // save cookie for 1 day
            setcookie('email', $request->email, time() + 60 * 60 * 24);
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Email or password is wrong, please try again');
        } 
    }
}
