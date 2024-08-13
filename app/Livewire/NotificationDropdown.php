<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class NotificationDropdown extends Component
{
    public $notifications = [];
    public $unreadCount = 0;

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        $userId = auth()->id();
        $username = auth()->user()->username;

        $mentionedComments = Comment::where('content', 'LIKE', "%@$username%")
        ->with('joinStatus')
        ->orderBy('created_at', 'desc')
        ->get();

        $ownFeedComments = Comment::whereHas('feed', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with('joinStatus')
        ->orderBy('created_at', 'desc')
        ->get();

        $combinedComments = $mentionedComments->merge($ownFeedComments);

        $this->notifications = $combinedComments->filter(function ($comment) use ($userId) {
            return $comment->user_id !== $userId;
        })->unique('id')->sortByDesc('created_at');

        $this->unreadCount = $this->notifications->where('is_read', false)->count();
    }

    public function markAsRead($commentId)
    {
        $user = auth()->user();

        $comment = Comment::find($commentId);

        if ($comment && $comment->user_id !== $user->id) {
            $comment->update(['is_read' => true]);
        }
    }

    public function render()
    {
        return view('livewire.notification-dropdown');
    }
}
