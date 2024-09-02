<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Feed;
use App\Services\NotificationService;
use Livewire\Component;

class NotificationDropdown extends Component
{
    public $notifications;
    public $unreadCount;
    public $isDropdown = true;

    protected $notificationService;

    public function mount(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->refreshNotifications();
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            $this->refreshNotifications();
        }
    }

    public function refreshNotifications()
    {
        $user = auth()->user();
        $this->notifications = $this->notificationService->getUserNotificationsWithDetails($user);
        $this->unreadCount = $this->notificationService->getUnreadCount($user);
    }

    public function render()
    {
        return view('livewire.notification-dropdown');
    }
}
