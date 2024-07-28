<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(Category::class);
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
}
