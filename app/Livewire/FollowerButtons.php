<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class FollowerButtons extends Component
{
    public $user;
    public $isFollowing;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isFollowing = Auth::user()->followings()->where('user_id', $user->id)->exists();
    }

    public function toggleFollow()
    {
        $userId = $this->user->id;
        $authUser = Auth::user();

        if ($this->isFollowing) {
            $authUser->followings()->detach($userId);
            $this->isFollowing = false;
            $this->dispatch('flashMessage', 'You have unfollowed ' . $this->user->name);
        } else {
            $authUser->followings()->attach([$userId => ['id' => (string) Str::uuid()]]);
            $this->isFollowing = true;
            $this->dispatch('flashMessage', 'You are now following ' . $this->user->name);
        }
    }
    public function render()
    {
        return view('livewire.follower-buttons');
    }
}
