<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Badge extends BaseModel
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
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
