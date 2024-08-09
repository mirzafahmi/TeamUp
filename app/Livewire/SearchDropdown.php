<?php

namespace App\Livewire;

use App\Models\Feed;
use App\Models\User;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $searchTerm = '';
    public $results = [];

    public function updatedSearchTerm()
    {
        $this->results = $this->fetchResults();
    }

    public function fetchResults()
    {
        return [
            'feeds' => Feed::where('content', 'like', "%{$this->searchTerm}%")->limit(5)->get(),
            'users' => User::where('username', 'like', "%{$this->searchTerm}%")->limit(5)->get()
        ];
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
