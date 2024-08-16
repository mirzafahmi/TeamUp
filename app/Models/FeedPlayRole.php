<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedPlayRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_id',
        'play_role_id',
        'spot_availability'
    ];

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }

    public function playRole()
    {
        return $this->belongsTo(PlayRole::class);
    }
}
