<?php

namespace App\Livewire;

use App\Models\Feed;
use Livewire\Component;

class FeedTabs extends Component
{
    public $activeTab = 'all';

    public function render()
    {
        $userId = auth()->id();
        $perPage = 5;
        $sortColumn = 'created_at'; 
        $sortDirection = 'desc'; 

        $feeds = $this->activeTab === 'followed'
            ? Feed::whereIn('user_id', function ($query) use ($userId) {
                $query->select('user_id')
                    ->from('followers')
                    ->where('follower_id', $userId);
            })
            ->orWhere('user_id', $userId)
            ->orderBy($sortColumn, $sortDirection)
            ->paginate($perPage)
            : Feed::orderBy($sortColumn, $sortDirection)
                ->paginate($perPage);

        return view('livewire.feed-tabs', ['feeds' => $feeds]);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
}
