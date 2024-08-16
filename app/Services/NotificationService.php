<?php

namespace App\Services;

use App\Models\Comment;

class NotificationService
{
    public function getNotifications($userId, $username)
    {
        $mentionedComments = Comment::where('content', 'LIKE', "%@$username%")
            ->with('joinStatus')
            ->orderBy('created_at', 'desc')
            ->get();

        $ownFeedComments = Comment::whereHas('feed', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with('joinStatus')
            ->orderBy('created_at', 'desc')
            ->get();

        $combinedComments = $mentionedComments->merge($ownFeedComments);

        return $combinedComments->filter(function ($comment) use ($userId) {
            return $comment->user_id !== $userId;
        })->unique('id')->sortByDesc('created_at');
    }
}
