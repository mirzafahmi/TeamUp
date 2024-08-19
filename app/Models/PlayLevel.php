<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayLevel extends BaseModel
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description'
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
