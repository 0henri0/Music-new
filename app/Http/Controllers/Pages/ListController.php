<?php

namespace App\Http\Controllers\Pages;

use App\Repositories\Pages\ListRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    /**
     *display list category
     */
    protected $listAll;

    public function __construct(ListRepository $listRepository)
    {
        $this->listAll = $listRepository;
    }

    public function listCategory()
    {
        $category = $this->listAll->getAllCategory();

        return view('pages.category', ['category' => $category]);
    }

    /**
     *display list songs
     */
    public function listSong()
    {
        $song = $this->listAll->getAllSong();

        return view('pages.listsong', ['listSong' => $song]);
    }

    /**
     *display list album of singer
     */
    public function listAlbum()
    {
        $album = $this->listAll->getAllAlbumSinger();

        return view('pages.listalbum', ['albumAll' => $album]);
    }

    public function listSongOfAlbum($id)
    {
        $song = $this->listAll->listSongOfAlbum($id);

        return view('pages.listsongofalbum', ['songOfAlbum' => $song]);
    }

    public function listSinger()
    {
        $singer = $this->listAll->listSinger();

        return view('pages.listsinger', ['singerAll' => $singer]);
    }

}
