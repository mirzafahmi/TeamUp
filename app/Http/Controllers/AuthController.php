<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:4|max:30',
                'username' => 'required|min:4|max:15|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
            ]
            );

        try {
            $user = User::create($validated);
        } catch(\Exception $e) {
            return redirect()->route('register')->with('error', $e->getMessage());
        }

        Auth::login($user);
        
        return redirect()->route('index')->with('success', 'Account created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('index')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password"
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
