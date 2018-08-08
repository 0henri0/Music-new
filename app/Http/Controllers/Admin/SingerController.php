<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SingerRequest;
use App\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\Singer\SingerRepositoryInterface;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    protected $singerRepository;
    protected $countryRepository;

    public function __construct(SingerRepositoryInterface $singerRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->singerRepository = $singerRepository;
        $this->countryRepository = $countryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = $this->singerRepository->getAll();

        return view('admin.singers.list', ['singer' => $singers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countryRepository->getAll();

        return view('admin.singers.create', ['country' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SingerRequest $request)
    {
        $data = $request->all();
        /**
         * handle file
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/singer' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/singer', $urlimage);

            $data['avatar'] = 'upload/images/avatar/singer/'.$urlimage;
        }
        /**
         *
         */
        $singers = $this->singerRepository->create($data);

        return redirect('admin/singers')->with('notify', 'Create Successful : ' . $singers->name);
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
        $country = $this->countryRepository->getAll();
        $singer = $this->singerRepository->find($id);

        return view('admin.singers.edit', ['country' => $country, 'singer' => $singer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $singer = $this->singerRepository->find($id);
        $data = $request->all();

        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/singer' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/singer', $urlimage);

            $data['avatar'] = 'upload/images/avatar/singer/'.$urlimage;
            if (file_exists('upload/images/avatar/singer/' . $singer->avatar)) {
                unlink('upload/images/avatar/singer/' . $singer->avatar);
            }

        }
        /**
         *
         */
        $singer = $this->singerRepository->update($id, $data);

        return redirect('admin/singers')->with('notify', 'Update Successful : ' . $singer->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singer = $this->singerRepository->find($id);
        $this->singerRepository->delete($id);

        return redirect('admin/singers')->with('notify', 'Delete Successful : ' . $singer->name);
    }
}
