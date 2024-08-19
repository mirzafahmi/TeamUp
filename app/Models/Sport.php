<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sport extends BaseModel
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id'
    ];

    public function getImageURL()
    {
        return url('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function playLevel()
    {
        return $this->hasMany(PlayLevel::class);
    }
    public function playMode()
    {
        return $this->hasMany(PlayMode::class);
    }

    public function playRole()
    {
        return $this->hasMany(PlayRole::class);
    }

    public function feed()
    {
        return $this->hasMany(Feed::class);
    }

    public function preferredByUsers()
    {
        return $this->hasMany(PreferredSport::class);
    }

    public function preferredByMutualFollowings()
    {
        $authUserId = Auth::id();

        return $this->hasManyThrough(User::class, PreferredSport::class, 'sport_id', 'id', 'id', 'user_id')
            ->whereIn('users.id', function ($query) use ($authUserId) {
                $query->select('user_id')
                    ->from('followers')
                    ->whereIn('user_id', function ($innerQuery) use ($authUserId) {
                        $innerQuery->select('user_id')
                            ->from('followers')
                            ->where('follower_id', $authUserId);
                    });
            })
            ->where('user_id', '!=', $authUserId);
    }
}
