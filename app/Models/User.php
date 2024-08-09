<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'bio',
        'image',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getImageURL()
    {
        if ($this->image)
        {
            return url('storage/' . $this->image);
        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->username}";
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    public function preferredSports()
    {
        return $this->belongsToMany(Sport::class, 'preferred_sports', 'user_id', 'sport_id')->withTimestamps();
    }


    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')->withTimestamps();
    }

    public function mutualFollowers()
    {
        $authUserId = auth()->id();

        return $this->followers()
            ->whereIn('follower_id', function ($query) use ($authUserId) {
                $query->select('follower_id')
                    ->from('followers')
                    ->where('user_id', $authUserId);
            })
            ->where('follower_id', '!=', $authUserId);
    }

    public function mutualFollowings()
    {
        $authUserId = auth()->id();

        return $this->followings()
            ->whereIn('user_id', function ($query) use ($authUserId) {
                $query->select('user_id')
                    ->from('followers')
                    ->where('follower_id', $authUserId);
            })
            ->where('user_id', '!=', $authUserId);
    }
}
