<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sport_id'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function feed()
    {
        return $this->hasMany(Sport::class);
    }

    public function feeds()
    {
        return $this->belongsToMany(Feed::class, 'feed_play_role')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
