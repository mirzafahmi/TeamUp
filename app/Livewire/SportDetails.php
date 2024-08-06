<?php

namespace App\Livewire;

use App\Models\EventLocation;
use App\Models\PlayLevel;
use App\Models\PlayMode;
use App\Models\PlayRole;
use App\Models\Sport;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SportDetails extends Component
{
    public $sportId;
    public $levelId;
    public $modeId;
    public $roleId;
    public $locationId;

    public $feed;
    public $editing = false;

    public $roleSets = [];

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

    #[Computed()]
    public function locations()
    {
        return EventLocation::all();
    }

    public function mount($feed = null, $editing = false)
    {
        $this->feed = $feed;
        $this->editing = $editing;

        if ($editing && $feed) {
            $this->sportId = $feed->sport_id;
            $this->levelId = $feed->play_level_id;
            $this->modeId = $feed->play_mode_id;
            $this->locationId = $feed->event_location_id;

            foreach ($feed->playRoles as $playRole) {
                $this->roleSets[] = [
                    'role' => $playRole->id,
                    'spot' => $playRole->pivot->spot_availability
                ];
            }
        } else {
            $this->roleSets[] = ['role' => null, 'spot' => null];
        }    
    }

    public function addRoleSet()
    {
        $this->roleSets[] = ['role' => null, 'spot' => null];
    }
    
    public function render()
    {
        return view('livewire.sport-details', [
            'sports' => $this->sports(),
            'levels' => $this->levels(),
            'modes' => $this->modes(),
            'roles' => $this->roles(),
            'locations' => $this->locations(),
        ]);
    }
}
