<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;
    protected $table = "badges";
    protected $fillable = [
        'name', 
        'description', 
        'image'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges')->withTimestamps();
    }

    public function getImageURL()
    {
        return url('storage/' . $this->image);
    }
}
