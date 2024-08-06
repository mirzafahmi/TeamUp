<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinStatus extends Model
{
    use HasFactory, HasUuids;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
