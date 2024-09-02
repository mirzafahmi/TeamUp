<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Feed;

class NotificationService
{
    public function getUserNotificationsWithDetails($user)
    {
        $notifications = $user->notifications;

        // Extract IDs from JSON data
        $commentIds = $notifications->pluck('data.comment_id')->unique()->filter()->toArray();
        $feedIds = $notifications->pluck('data.feed_id')->unique()->filter()->toArray();

        // Retrieve related models with eager loading
        $comments = Comment::whereIn('id', $commentIds)
            ->with(['user:id,name,image,username', 'playRole', 'joinStatus'])
            ->get()->keyBy('id');

        $feeds = Feed::whereIn('id', $feedIds)
            ->with(['user:id,name,image,username', 'sport', 'playMode', 'playLevel', 'playRoles', 'eventLocation'])
            ->get()->keyBy('id');


        // Map notifications with related models
        return $notifications->map(function ($notification) use ($comments, $feeds) {
            return [
                'id' => $notification->id,
                'message' => $notification->data['message'],
                'comment' => $comments->get($notification->data['comment_id']),
                'feed' => $feeds->get($notification->data['feed_id']),
                'is_read' => $notification->read_at !== null,
            ];
        });
    }

    public function getUnreadCount($user)
    {
        return $user->unreadNotifications->count();
    }
}
