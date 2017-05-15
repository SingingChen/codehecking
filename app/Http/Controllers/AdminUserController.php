<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file(['photo_id']))
        {


            $name = time() . $file->getClientOriginalName();

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//            將檔案移至public/images下
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $file->move('images',$name);

            //  將檔名放進photos資料表裡的file欄位

            $photo = Photo::create(['file'=>$name]);

//            將$request->photo_id 改成上面存進資料庫$photo 的id

            $input['photo_id'] = $photo->id;

        }

//        密碼加密
        $input['password'] = bcrypt($request->password);

//        存進資料庫
        User::create($input);


//        User::create($request->all());

        return redirect('admin/users');

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
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        if (trim($request->password) == ''){

            $input = $request->except('password');
        }else{
            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }

        $user = User::findOrFail($id);

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=> $name]);

            $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        Session::flash('delete_user','The User Has Been Deleted');
        
        return redirect('admin/users');

    }
}
