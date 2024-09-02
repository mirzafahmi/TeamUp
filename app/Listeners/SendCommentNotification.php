<?php

namespace App\Listeners;

use App\Events\CommentAdded;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    use InteractsWithQueue;

    public function handle(CommentAdded $event)
    {
        $comment = $event->comment;

        // Notify the owner of the feed
        $feedOwner = $comment->feed->user;
        $feedOwner->notify(new CommentNotification($comment));

        // Notify users who have commented on the same feed
        $usersWhoCommented = $comment->feed->comments()->where('user_id', '!=', $comment->user_id)->pluck('user_id');
        
        foreach ($usersWhoCommented as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new CommentNotification($comment));
            }
        }
    }
}
