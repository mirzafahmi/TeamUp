<?php

namespace App\Livewire;

use App\Models\Feed;
use Livewire\Component;
use Livewire\WithPagination;

class FeedTabs extends Component
{
    use WithPagination;
    public $activeTab = 'all';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $userId = auth()->id();
        $perPage = 5;
        $sortColumn = 'created_at'; 
        $sortDirection = 'desc'; 

        $feeds = $this->activeTab === 'followed'
            ? Feed::with(['comments' => function ($query) {
                $query->where('request_to_join', true)
                      ->whereHas('joinStatus', function ($statusQuery) {
                          $statusQuery->where('name', 'Approved');
                      });
                }])
                ->whereIn('user_id', function ($query) use ($userId) {
                    $query->select('user_id')
                        ->from('followers')
                        ->where('follower_id', $userId);
                })
                ->orWhere('user_id', $userId)
                ->orderBy($sortColumn, $sortDirection)
                ->paginate($perPage)
            : Feed::with(['comments' => function ($query) {
                $query->where('request_to_join', true)
                      ->whereHas('joinStatus', function ($statusQuery) {
                          $statusQuery->where('name', 'Approved');
                      });
                }])
                ->orderBy($sortColumn, $sortDirection)
                ->paginate($perPage);

        return view('livewire.feed-tabs', ['feeds' => $feeds]);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }
}
