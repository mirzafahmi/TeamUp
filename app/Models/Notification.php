<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'data->comment_id');
    }

    public function getDataCommentIdAttribute()
    {
        return $this->data['comment_id'] ?? null;
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class, 'data->feed_id'); 
    }

    public function getDataFeedIdAttribute()
    {
        return $this->data['feed_id'] ?? null;
    }
}
