<?php

namespace App\Livewire;

use App\Models\PlayLevel;
use App\Models\PlayMode;
use App\Models\PlayRole;
use App\Models\Sport;
use Livewire\Attributes\Computed;
use Livewire\Component;

class GameModeRole extends Component
{
    public $sportId;
    public $levelId;
    public $modeId;
    public $roleId;

    public $feed;
    public $editing = false;

    #[Computed()]
    public function sports()
    {
        return Sport::all();
    }

    #[Computed()]
    public function levels()
    {
        return PlayLevel::all();
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

    public function mount($feed = null, $editing = false)
    {
        $this->feed = $feed;
        $this->editing = $editing;

        if ($editing && $feed) {
            $this->sportId = $feed->sport_id;
            $this->levelId = $feed->play_level_id;
            $this->modeId = $feed->play_mode_id;
            $this->roleId = $feed->play_role_id;
        }
    }

    public function render()
    {
        return view('livewire.game-mode-role', [
            'sports' => $this->sports(),
            'levels' => $this->levels(),
            'modes' => $this->modes(),
            'roles' => $this->roles(),
        ]);
    }
}
