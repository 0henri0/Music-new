<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\AlbumSong\AlbumSongRepository as albumSong;

class AlbumSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $albumSong;

    public function __construct(albumSong $albumSong)
    {
        $this->albumSong = $albumSong;
    }

    public function index($id)
    {
        $song2 = $this->albumSong->getSongBySinger($id);
        $song = $this->albumSong->getSong($id);
        return view('admin.albumsongs.list', ['song' => $song, 'id' => $id, 'song2' => $song2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request['song_id'];

        $this->albumSong->insertAlbum($id, $data);

        return redirect("admin/$id/albumsongs");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id1)
    {

        $this->albumSong->detachAlbum($id, $id1);

        return redirect("admin/$id/albumsongs");
    }
}
