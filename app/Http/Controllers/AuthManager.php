<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthManager extends Controller
{
    // login
    public function login()
    {
        return view('auth.login');
    }

    // handle  login 
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6', 
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended(route('home'));
        }

        return back()->with('error', 'Invalid email or password')->withInput();
    }

    // register
    public function register()
    {
        return view('auth.register');
    }

    // handle register
    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('login')->with('success', 'User created successfully!');
        }

        return redirect()->route('register')->with('error', 'User creation failed.');
    }
}
