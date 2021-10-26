<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ImageUpload;
use App\Models\Setting;

class SettingController extends AdminController
{   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $settings = Setting::pluck('value','name');

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $input = $request->all();

        switch ($request->step) {
            case 'basic':
                
                $request->validate([
                    'page_title'=>'required',
                ]);

                break;

            default:
                # code...
                break;
        }

        if ($request->hasFile('logo')) {
            $input['logo'] = ImageUpload::upload('upload/setting',$input['logo']);
        }

        if ($request->hasFile('favicon_icon')) {
            $input['favicon_icon'] = ImageUpload::upload('upload/setting',$input['favicon_icon']);
        }

        foreach ($input as $key => $value) {
            Setting::where('name', $key)->update(['value'=>$value]);
        }

        notificationMsg('success','Setting Update Successfully');
        return back()->withInput();
    }

}
