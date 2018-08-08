<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SongRequest;
use App\Repositories\Category\categoryRepositoryInterface as Category;
use App\Repositories\Singer\singerRepositoryInterface as Singer;
use App\Repositories\Song\SongRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    protected $songRepository;
    protected $category;
    protected $singer;

    public function __construct(SongRepositoryInterface $songRepository, Category $category, Singer $singer)
    {
        $this->songRepository = $songRepository;
        $this->category = $category;
        $this->singer = $singer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = $this->songRepository->getAll();

        return view('admin.songs.list', ['song' => $song]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->getAll();
        $singer = $this->singer->getAll();

        return view('admin.songs.create', ['category' => $category, 'singer' => $singer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {

        $request->merge(['user_id' => Auth::user()->id]);
        if (!$request['category_id']) {
            $request->merge(['category_id' => '-1']);
        }
        $data = $request->all();

        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/song' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/song', $urlimage);

            $data['avatar'] = 'upload/images/avatar/song/'.$urlimage;
        }
        /**
         *
         */
        /**
         * handle file avatar
         */
        if ($request['fileSong']) {
            $music = $request->file('fileSong');
            $ext = $music->getClientOriginalExtension();
            $urlSong = substr(time() . mt_rand() . '_' . $music->getClientOriginalName(), -190);
            while (file_exists('upload/song' . $urlSong)) {
                $urlSong = substr(time() . mt_rand() . '_' . $music->getClientOriginalName(), -190);
            }
            $music->move('upload/song', $urlSong);

            $data['url'] = 'upload/song/'.$urlSong;
        }
        /**
         *
         */
        $song = $this->songRepository->create($data);
        if ($data['category_id'] != '-1') {
            $song->categories()->sync($data['category_id']);
        }
        if ($request['singer_id']) {
            $song->singers()->sync($request['singer_id']);
        }
        return redirect('admin/songs')->with('notify', 'Create Successful : ' . $song->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = $this->songRepository->find($id);
        $category = $this->category->getAll();
        $singer = $this->singer->getAll();

        return view('admin.songs.edit', ['song' => $song, 'category' => $category, 'singer' => $singer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(songRequest $request, $id)
    {

        $song = $this->songRepository->find($id);
        $request->merge(['user_id' => Auth::user()->id]);
        if (!$request['category_id']) {
            $request->merge(['category_id' => '-1']);
        }
        $data = $request->all();

        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/song' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/song', $urlimage);

            $data['avatar'] = 'upload/images/avatar/song/'.$urlimage;
            $str = 'upload/images/avatar/song/' . $song->avatar;
            if (file_exists($str) && $song->avatar != null) {
                unlink($str);
            }

        }
        /**
         *
         */
        /**
         * handle file avatar
         */
        if ($request['fileSong']) {
            $music = $request->file('fileSong');
            $ext = $music->getClientOriginalExtension();
            $urlSong = substr(time() . mt_rand() . '_' . $music->getClientOriginalName(), -190);
            while (file_exists('upload/song' . $urlSong)) {
                $urlSong = substr(time() . mt_rand() . '_' . $music->getClientOriginalName(), -190);
            }
            $music->move('upload/song', $urlSong);

            $data['url'] ='upload/song/'. $urlSong;
            if ($song->url != 'default.mp3' && file_exists('upload/song' . $song->url)) {
                unlink('upload/song/' . $song->url);
            }

        }
        /**
         *
         */
        $song = $this->songRepository->update($id, $data);
        if ($data['category_id'] != '-1') {
            $song->categories()->sync($data['category_id']);
        }
        if ($request['singer_id']) {
            $song->singers()->sync($request['singer_id']);
        }
        return redirect('admin/songs')->with('notify', 'Update Successful : ' . $song->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = $this->songRepository->find($id);
        $this->songRepository->delete($id);

        return redirect('admin/songs')->with('notify', 'Delete Successful : ' . $song->name);
    }
}
