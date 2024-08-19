<?php

namespace App\Livewire;

use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class SportCard extends Component
{

    public $sport;
    public $index;
    public $totalCount;

    public $isLiked;

    public function toggleLike()
    {
        $sportId = $this->sport->id;
        $authUser = Auth::user();

        if ($this->isLiked) {
            $authUser->preferredSports()->detach($sportId);
            $this->isLiked = false;
            $this->dispatch('flashMessage', 'You unliked ' . $this->sport->name);
        } else {
            $authUser->preferredSports()->attach([$sportId => ['id' => (string) Str::uuid()]]);
            $this->isLiked = true;
            $this->dispatch('flashMessage', 'You liked ' . $this->sport->name);
        }
    }

    public function mount(Sport $sport, $index, $totalCount)
    {
        $this->sport = $sport;
        $this->index = $index;
        $this->totalCount = $totalCount;
        $this->isLiked = Auth::user()->preferredSports()->where('sport_id', $sport->id)->exists();
    }
    public function render()
    {
        return view('livewire.sport-card');
    }
}
