<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Models\User;
use App\Models\ImageUpload;

class AdminUserController extends AdminController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::where('user_type',0)->latest()->get();

        return view('admin.adminUser.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $input = $request->all();
        $input['user_type'] = 0;
        $input['password']  = bcrypt($input['password']);

        if(!empty($input['photo'])){  
            $input['photo'] = ImageUpload::upload('upload/user',$input['photo']);
        }

        User::create($input);

        notificationMsg('success','Admin Create Successfully');
        return redirect()->route('admin-user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin_user)
    {
        return view('admin.adminUser.show',compact('admin_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin_user)
    {
        return view('admin.adminUser.edit',compact('admin_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin_user)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email,'.$admin_user->id,
        ]);

        $input = $request->all();

        if(!empty($input['photo'])){  
            $input['photo'] = ImageUpload::upload('upload/user',$input['photo']);
        }

        $admin_user->update($input);

        notificationMsg('success','Admin Update Successfully');
        return redirect()->route('admin-user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin_user)
    {
        $admin_user->delete();

        notificationMsg('success','Admin Delete Successfully');
        return redirect()->route('admin-user.index');
    }

     /**
     * Write code on Method
     *
     * @return response()
    */
    public function profile()
    {   
        $user = auth()->user();
        return view('admin.profile.index',compact('user'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();

        if(!empty($input['photo'])){  
            $input['photo'] = ImageUpload::upload('upload/user',$input['photo']);
        }

        $user = auth()->user();

        $user->update($input);

        notificationMsg('success','Profile Update Successfully');
        return back();
    }
}
