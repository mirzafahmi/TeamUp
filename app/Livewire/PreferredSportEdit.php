<?php

namespace App\Livewire;

use App\Models\PreferredSport;
use App\Models\Sport;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class PreferredSportEdit extends Component
{
    public $user;
    public $sportId;
    public $availableSports;
    public $preferredSports;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->loadSports();
    }

    // called when there is change of SportId that model:live in the template
    public function updatedSportId($value)
    {
        if ($value) {
            $this->user->preferredSports()->attach([
                $value => ['id' => (string) Str::uuid()]
            ]);

            $this->loadSports();
            $this->sportId = null;
        }
    }

    public function deletePreferredSport($preferredSportId)
    {
        
        $this->user->preferredSports()->detach($preferredSportId);
        $this->loadSports();
    }

    protected function loadSports()
    {
        $preferredSportIds = $this->user->preferredSports()->pluck('sport_id')->toArray();
        
        $this->availableSports = Sport::whereNotIn('id', $preferredSportIds)->get();
        $this->preferredSports = $this->user->preferredSports()->get();
    }
    public function render()
    {
        return view('livewire.preferred-sport-edit');
    }
}
