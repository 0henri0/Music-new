<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * [$UserRepository description]
     * @var [App\Repositories\User\UserRepositoryInterface]
     */
    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->UserRepository->getAll();

        return view('admin.users.list', ['user' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->UserRepository->find($id);

        return view('admin.users.edit', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = $this->UserRepository->find($id);
        /**
         * handle file
         */
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $ext = $img->getClientOriginalExtension();
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/avatar/user' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/avatar/user', $urlimage);

            $data['avatar'] = 'upload/images/avatar/user/' .$urlimage;
            $str = 'upload/images/avatar/user/' . $user->avatar;

            if (file_exists($str) && $user->avatar != null) {
                unlink($str);
            }

        }
        /**
         *
         */
        if ($request['password']) {
            $data['password'] = bcrypt($request['password']);
        }
        $this->UserRepository->update($id, $data);

        return redirect('admin/users')->with('notify', 'Update Successful : ' . $user->email);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->UserRepository->find($id);
        $this->UserRepository->delete($id);

        return redirect('admin/users')->with('notify', 'Delete Successful : ' . $user->email);
    }
}
