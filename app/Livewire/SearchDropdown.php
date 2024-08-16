<?php

namespace App\Livewire;

use App\Models\Feed;
use App\Models\User;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $searchTerm = '';
    public $results = [];

    public $isFocused = false;
    
    public function updatedSearchTerm()
    {
        $this->results = $this->fetchResults();
    }

    public function fetchResults()
    {
        $query = $this->searchTerm;
        
        $feeds = Feed::where('content', 'like', "%{$query}%")
            ->orwhereHas('user', function ($q) use ($query) {
                $q->where('username', 'like', "%{$query}%");
            })
            ->orWhereHas('sport', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orderBy("created_at","desc")
            ->limit(5)->get();

        return [
            'feeds' => $feeds,
            'users' => User::where('username', 'like', "%{$this->searchTerm}%")->limit(5)->get()
        ];
    }

    public function setFocus($value)
    {
        $this->isFocused = $value;
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
