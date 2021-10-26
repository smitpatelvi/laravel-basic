<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Models\User;
use App\Models\ImageUpload;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::where('user_type',1)->latest()->get();

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        $input['user_type'] = 1;
        $input['password']  = bcrypt($input['password']);

        if(!empty($input['photo'])){  
            $input['photo'] = ImageUpload::upload('upload/user',$input['photo']);
        }

        User::create($input);

        $details = [
            'title' => 'Welcome To Sample Project '.$input['name'],
            'body' => 'This is for welcome email.'
        ];
       
        \Mail::to($input['email'])->send(new \App\Mail\UserMail($details));

        notificationMsg('success','User Create Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);

        $input = $request->all();

        if(!empty($input['photo'])){  
            $input['photo'] = ImageUpload::upload('upload/user',$input['photo']);
        }

        $user->update($input);

        notificationMsg('success','User Update Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        notificationMsg('success','User Delete Successfully');
        return redirect()->route('user.index');
    }
}
