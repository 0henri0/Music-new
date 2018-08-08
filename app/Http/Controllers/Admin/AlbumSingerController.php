<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlbumSingerRequest;
use App\Http\Requests\AlbumSongerRequest;
use App\Repositories\AlbumSinger\AlbumSingerloquentRepository as AlbumSinger;
use App\Repositories\Singer\SingerRepositoryInterface;
use Illuminate\Http\Request;

class AlbumSingerController extends Controller
{
    protected $albumSingerRepository;
    protected $singer;

    public function __construct(SingerRepositoryInterface $singer, AlbumSinger $albumSingerRepository)
    {
        $this->albumSingerRepository = $albumSingerRepository;
        $this->singer = $singer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumSinger = $this->albumSingerRepository->getAll();

        return view('admin.albumsingers.list', ['albumSinger' => $albumSinger]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $singer = $this->singer->getAll();

        return view('admin.albumsingers.create', ['singer' => $singer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumSingerRequest $request)
    {

        $data = $request->all();
        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/albumsinger' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/albumsinger', $urlimage);

            $data['avatar'] ='upload/images/avatar/albumsinger/' .$urlimage;

        }
        /**
         *
         */
        $albumSinger = $this->albumSingerRepository->create($data);

        return redirect('admin/albumsingers')->with('notify', "create $albumSinger->name successful!");
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
        $albumSinger = $this->albumSingerRepository->find($id);
        $singer = $this->singer->getAll();

        return view('admin.albumsingers.edit', ['albumSinger' => $albumSinger, 'singer' => $singer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumSongerRequest $request, $id)
    {

        $albumSinger = $this->albumSingerRepository->find($id);
        $data = $request->all();
        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/albumsinger' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/albumsinger', $urlimage);

            $data['avatar'] = 'upload/images/avatar/albumsinger/'.$urlimage;
            $str = 'upload/images/avatar/albumsinger/' . $albumSinger->avatar;
            if (file_exists($str && $albumSinger->avatar != null)) {
                unlink($str);
            }

        }
        /**
         *
         */
        $albumSinger = $this->albumSingerRepository->update($id, $data);

        return redirect('admin/albumsingers')->with('notify', "Update $albumSinger->name successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albumSinger = $this->albumSingerRepository->find($id);
        $this->albumSingerRepository->delete($id);

        return redirect('admin/albumsingers')->with('notify', 'Delete Successful : ' . $albumSinger->name);
    }
}
