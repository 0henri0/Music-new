<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name', 'user_id', 'url', 'lyrics', 'avatar', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function albumUsers()
    {
        return $this->belongsToMany('App\Models\AlbumUser', 'album_user_song', 'song_id', 'album_user_id');
    }
    public function albumSingers()
    {
        return $this->belongsToMany('App\Models\AlbumSinger', 'album_singer_song', 'song_id', 'album_singer_id')->withTimestamps();
    }
    public function singers()
    {
        return $this->belongsToMany('App\Models\Singer', 'song_singer', 'song_id', 'singer_id')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_song', 'song_id', 'category_id')
            ->withTimestamps();
    }
}
