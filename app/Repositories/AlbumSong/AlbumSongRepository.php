<?php

namespace App\Repositories\AlbumSong;

use Illuminate\Support\Carbon;

class AlbumSongRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model = [];

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->_model['song'] = app()->make(\App\Models\Song::class);
        $this->_model['singer'] = app()->make(\App\Models\Singer::class);
        $this->_model['albumSinger'] = app()->make(\App\Models\AlbumSinger::class);
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getSong($id_albumSinger)
    {
        $song = $this->_model['albumSinger']::findOrFail($id_albumSinger)->songs;

        return $song;
    }

    public function getSongBySinger($id_albumSinger)
    {
        $singer = $this->_model['albumSinger']::findOrFail($id_albumSinger)->singer;
        $song = $singer->songs;

        return $song;

    }

    public function insertAlbum($id, $data)
    {
        $album = $this->_model['albumSinger']::find($id);
        $album->songs()->syncWithoutDetaching($data);
    }

    public function detachAlbum($id, $data)
    {
        $album = $this->_model['albumSinger']::find($id);
        $album->songs()->detach($data);
    }

}
