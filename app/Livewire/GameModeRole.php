<?php

namespace App\Livewire;

use App\Models\PlayMode;
use App\Models\PlayRole;
use App\Models\Sport;
use Livewire\Attributes\Computed;
use Livewire\Component;

class GameModeRole extends Component
{
    public $sportId;
    public $modeId;
    public $roleId;

    #[Computed()]
    public function sports()
    {
        return Sport::all();
    }

    #[Computed()]
    public function modes()
    {
        return PlayMode::where('sport_id', $this->sportId)->get();
    }

    #[Computed()]
    public function roles()
    {
        return PlayRole::where('sport_id', $this->sportId)->get();
    }

    public function render()
    {
        return view('livewire.game-mode-role');
    }
}
