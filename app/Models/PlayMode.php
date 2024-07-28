<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayMode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'team_size'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function feed()
    {
        return $this->hasMany(Sport::class);
    }
}
