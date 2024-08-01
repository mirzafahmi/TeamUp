<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_id',
        'user_id',
        'content',
        'request_to_join'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function feed() 
    {
        return $this->belongsTo(Feed::class);
    }
}
