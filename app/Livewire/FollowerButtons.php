<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        } else {
            $authUser->followings()->attach($userId);
            $this->isFollowing = true;
        }
    }
    public function render()
    {
        return view('livewire.follower-buttons');
    }
}
