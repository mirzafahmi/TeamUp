<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferredSport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sport_id'
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sports()
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    public function getImageURL()
    {
        return url('storage/' . $this->sports->image);
    }
}
