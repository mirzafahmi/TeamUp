<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    
    protected $fillable = [
        'sport_id',
        'play_level_id',
        'play_mode_id',
        'spot_availibity',
        'content',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
