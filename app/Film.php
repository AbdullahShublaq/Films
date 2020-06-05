<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    //
    protected $table = 'films';

    protected $fillable = ['name', 'year', 'overview', 'background_cover', 'poster', 'url'];

    protected static function booted()
    {
        static::deleting(function (Film $film) {
            $attributes = $film->getAttributes();
            Storage::delete($attributes['background_cover']);
            Storage::delete($attributes['poster']);
        });
    }

    public function getPosterAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getBackgroundCoverAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'film_category');
    }

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'ratings');
    }
}
