<?php

namespace App\Livewire;

use App\Models\Feed;
use App\Models\PlayRole;
use Livewire\Component;

class RequestToJoin extends Component
{
    public $feedId;
    public $showRoleDropdown;
    public $selectedRole;
    public $roles;
    public $editing;

    public function mount($feedId, $showRoleDropdown = false, $selectedRole = null, $editing = false)
    {
        $this->feedId = $feedId;
        $this->showRoleDropdown = $showRoleDropdown;
        $this->selectedRole = $selectedRole;
        $this->editing = $editing;
        $this->roles = $this->getFeedRoles();
    }

    public function updatedRequestToJoin($value)
    {
        $this->showRoleDropdown = $value;
    }

    public function getFeedRoles()
    {
        $feed = Feed::with('playRoles')->find($this->feedId);
        return $feed ? $feed->playRoles : collect();
    }

    public function render()
    {
        return view('livewire.request-to-join');
    }
}
