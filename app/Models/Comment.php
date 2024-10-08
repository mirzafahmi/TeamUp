<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $with = [
        'user',
        'playRole',
        'joinStatus'
    ];

    protected $fillable = [
        'feed_id',
        'user_id',
        'content',
        'request_to_join',
        'play_role_id',
        'join_status_id',
        'is_read'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function feed() 
    {
        return $this->belongsTo(Feed::class);
    }

    public function playRole()
    {
        return $this->belongsTo(PlayRole::class);
    }

    public function joinStatus()
    {
        return $this->belongsTo(JoinStatus::class);
    }
}
