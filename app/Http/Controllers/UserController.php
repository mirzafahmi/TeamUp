<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {   
        $feeds = $user->feeds()->orderBy('created_at', 'DESC')->paginate(5);
        $sports = $user->preferredSports()->get();
        $followers = $user->followers()->get();
        $followings = $user->followings()->get();

        if (auth()->check() && auth()->user()->id == $user->id) {
            return redirect()->route('profile');
        }

        return view('users.show', compact('user', 'feeds', 'sports', 'followers', 'followings'));
    }

    public function profile()
    {
        $user = auth()->user();
        $feeds = $user->feeds()->orderBy('created_at', 'DESC')->paginate(5);
        $sports = $user->preferredSports()->get();
        $followers = $user->followers()->get();
        $followings = $user->followings()->get();

        return view('users.show', compact('user', 'feeds', 'sports', 'followers', 'followings'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $validated = request()->validate(
                [
                    'name' => 'required|min:4|max:30',
                    'username' => 'required|min:4|max:15|unique:users,username,'. $user->id,
                    'email' => 'required|email|unique:users,email,'. $user->id,
                    'bio' => 'nullable|min:1|max:255',
                    'image' => 'image|max:2048'
                ]
            );
        
        if (isset($validated['bio']))
        {
            $validated['bio'] = trim($validated['bio']);
        }

        if(request()->has('image'))
        {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Your profile infomation updated successfully!');
    }

    public function destroy(User $user, Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Your profile deleted successfully!');
    }
}
