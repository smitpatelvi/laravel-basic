<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class AdminHomeController extends AdminController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
        return view('admin.home.index');
    }
}
