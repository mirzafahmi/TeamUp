<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $with = ['user:id,name,image'];
    
    protected $fillable = [
        'sport_id',
        'play_level_id',
        'play_mode_id',
        'play_role_id',
        'spot_availability',
        'content',
        'event_date',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
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
}
