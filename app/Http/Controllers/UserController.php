<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $validated = request()->validate(
                [
                    'name' => 'required|min:4|max:30',
                    'bio' => 'nullable|min:1|max:255',
                    'image' => 'image'
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

        $user->update($validated);

        return redirect()->route('profile');
    }
}
