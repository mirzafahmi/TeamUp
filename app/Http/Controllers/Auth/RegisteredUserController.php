<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
                'name' => 'required|min:4|max:30',
                'username' => 'required|min:4|max:15|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
        ]);
        
        try {
            $user = User::create($validated);
        } catch(\Exception $e) {
            return redirect()->route('register')->with('error', $e->getMessage());
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('index')->with('success', 'Account created successfully!');
    }
}
