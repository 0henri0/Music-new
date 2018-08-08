<?php
/**
 * Created by PhpStorm.
 * User: thai-cute
 * Date: 8/8/2018
 * Time: 9:20 AM
 */

namespace App\Repositories\Pages;

use Illuminate\Support\Carbon;

class ListRepository
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
        $this->_model['category'] = app()->make(\App\Models\Category::class);
        $this->_model['albumSinger'] = app()->make(\App\Models\AlbumSinger::class);
        $this->_model['singer'] = app()->make(\App\Models\Singer::class);
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllSong()
    {

        return $this->_model['song']::orderBy('created_at', 'desc')->paginate(20);
    }

    /**
     * @return mixed
     */
    public function getAllCategory()
    {

        return $this->_model['category']::orderBy('created_at', 'desc')->paginate(24);
    }

    /**
     * @return mixed
     */
    public function getAllAlbumSinger()
    {

        return $this->_model['albumSinger']::orderBy('created_at', 'desc')->paginate(24);
    }

    /**
     *listSongOfAlbum
     */
    public function listSongOfAlbum($id)
    {
        $song = $this->_model['albumSinger']::findOrFail($id)->songs;

        return $song;
    }

    /**
     * @return listSinger
     */
    public function listSinger()
    {
        $singer = $this->_model['singer']::orderBy('created_at', 'desc')->paginate(20);

        return $singer;
    }

}
