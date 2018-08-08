<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable = [
        'name', 'country_id', 'date_of_birth', 'introduction', 'vague', 'avatar',
    ];
    public function countries()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function albumSingers()
    {
        return $this->hasMany('App\Models\AlbumSinger');
    }
    public function songs()
    {
        return $this->belongsToMany('App\Models\Song', 'song_singer', 'singer_id', 'song_id')->withTimestamps();
    }
}
