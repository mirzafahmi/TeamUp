<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FeedPlayRole extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'feed_id',
        'play_role_id',
        'spot_availability'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }

    public function playRole()
    {
        return $this->belongsTo(PlayRole::class);
    }
}
