<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Actor extends Model
{
    //
    protected $table = 'actors';

    protected $fillable = ['name', 'dob', 'avatar', 'background_cover', 'overview', 'biography'];

    protected static function booted()
    {
        static::deleting(function (Actor $actor) {
            $attributes = $actor->getAttributes();
            Storage::delete($attributes['background_cover']);
            Storage::delete($attributes['avatar']);
        });
    }

    public function getAvatarAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getBackgroundCoverAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_actor');
    }
}
