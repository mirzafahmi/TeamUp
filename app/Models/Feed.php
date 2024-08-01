<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $with = ['user:id,name,image,username'];
    
    protected $fillable = [
        'sport_id',
        'play_level_id',
        'play_mode_id',
        'play_role_id',
        'spot_availability',
        'content',
        'event_location_id',
        'user_id',
        'event_date'
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

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function eventLocation()
    {
        return $this->belongsTo(EventLocation::class);
    }
}
