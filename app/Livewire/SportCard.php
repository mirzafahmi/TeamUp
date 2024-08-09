<?php

namespace App\Livewire;

use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        } else {
            $authUser->preferredSports()->attach($sportId);
            $this->isLiked = true;
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
