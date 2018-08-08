<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\categoryRepositoryInterface as Category;
use App\Repositories\Country\CountryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $countryRepository;

    public function __construct(Category $category, CountryRepositoryInterface $countryRepository)
    {
        $this->categoryRepository = $category;
        $this->countryRepository = $countryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = $this->categoryRepository->getAll();

        return view('admin.categories.list', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countryRepository->getAll();

        return view('admin.categories.create', ['country' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->all();
        /**
         * handle file
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/category' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/category', $urlimage);

            $data['avatar'] = 'upload/images/avatar/category/'.$urlimage;
        }
        /**
         *
         */
        $category = $this->categoryRepository->create($data);

        return redirect('admin/categories')->with('notify', 'Create Successful : ' . $category->name);
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
        $countries = $this->countryRepository->getAll();
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.edit', ['category' => $category, 'country' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->find($id);
        $data = $request->all();
        /**
         * handle file avatar
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/category' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/category', $urlimage);

            $data['avatar'] = 'upload/images/avatar/category/'.$urlimage;
            $str = 'upload/images/avatar/category/' . $category->avatar;
            if (file_exists($str)&&$category->avatar!=null) {
                unlink($str);
            }

        }
        /**
         *
         */
        $singer = $this->categoryRepository->update($id, $data);

        return redirect('admin/categories')->with('notify', "Update $category->name successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);
        $this->categoryRepository->delete($id);

        return redirect('admin/categories')->with('notify', 'Delete Successful : ' . $category->name);
    }
}
