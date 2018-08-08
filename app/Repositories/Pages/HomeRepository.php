<?php

namespace App\Repositories\Pages;

use Illuminate\Support\Carbon;

class HomeRepository
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
        $this->_model['user'] = app()->make(\App\Models\User::class);
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getSong()
    {

        $song = $this->_model['song']::all()->reverse()->take(6);

        return $song;
    }

    public function getOneSong()
    {
        $song= $this->_model['song']::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('view', 'desc')->take(1)->get();

        if($song==null){
            $song='upload/dung-de-thoi-gian-ben-nhau-la-thoi-quen.mp3';
        }

        return $song;

    }

    public function getUser()
    {
        $user = $this->_model['user']::all()->reverse()->take(5);

        return $user;
    }

    public function getCategory()
    {

        return $this->_model['category']->take(5);
    }

    public function getAlbumSinger()
    {

        return $this->_model['albumSinger']::all()->reverse()->take(8);
    }

    public function getAlbumHot()
    {

        return $this->_model['albumSinger']::all()->reverse()->take(3);
    }

    public function getAlbumFeatured()
    {

        return $this->_model['albumSinger']::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('view', 'desc')->take(8)->get();
    }

    public function getSong30Day()
    {

        return $this->_model['song']::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('view', 'desc')->take(4)->get();
    }

    public function getCategory30Day()
    {

        return $this->_model['category']::where('created_at', '>=', Carbon::now()->subMonth())->take(7)->get();
    }

}
