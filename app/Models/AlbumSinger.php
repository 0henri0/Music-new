<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumSinger extends Model
{
    protected $table = "album_singers";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'singer_id', 'avatar',
    ];
    public function singer()
    {
        return $this->belongsTo('App\Models\Singer');
    }
    public function songs()
    {
        return $this->belongsToMany('App\Models\Song', 'album_singer_song', 'album_singer_id', 'song_id')->withTimestamps();
    }
}
