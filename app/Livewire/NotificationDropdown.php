<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Services\NotificationService;
use Livewire\Component;

class NotificationDropdown extends Component
{
    public $notifications = [];
    public $unreadCount = 0;

    public function mount(NotificationService $notificationService)
    {
        $this->loadNotifications($notificationService);
    }

    public function loadNotifications(NotificationService $notificationService)
    {
        $userId = auth()->id();
        $username = auth()->user()->username;
    
        $this->notifications = $notificationService->getNotifications($userId, $username);
        $this->unreadCount = $this->notifications->where('is_read', false)->count();
    }

    public function markAsRead($commentId)
    {
        $user = auth()->user();
        $comment = Comment::find($commentId);
        
        if ($comment && $comment->user_id !== $user->id) {
            $comment->update(['is_read' => true]);
            
            $this->loadNotifications(app(NotificationService::class));
        }
    }

    public function render()
    {
        return view('livewire.notification-dropdown');
    }
}
