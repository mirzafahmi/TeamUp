<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $with = [
        'user:id,name,image,username', 
        'comments', 
        'playLevel', 
        'playMode', 
        'playRoles', 
        'sport', 
        'eventLocation'
    ];
    
    protected $fillable = [
        'sport_id',
        'play_level_id',
        'play_mode_id',
        'content',
        'event_location_id',
        'user_id',
        'event_date'
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    public function playLevel()
    {
        return $this->belongsTo(PlayLevel::class);
    }
    public function playMode()
    {
        return $this->belongsTo(PlayMode::class);
    }

    public function playRole()
    {
        return $this->belongsTo(PlayRole::class);
    }

    public function playRoles()
    {
        return $this->belongsToMany(PlayRole::class, 'feed_play_roles')->withPivot('spot_availability', 'created_at', 'updated_at')->withTimestamps();
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function eventLocation()
    {
        return $this->belongsTo(EventLocation::class);
    }
}
