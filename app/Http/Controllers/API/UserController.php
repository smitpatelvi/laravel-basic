<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\ImageUpload;
use App\Models\User;
use Validator;
use Auth;

class UserController extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function view()
    {
        $user = User::find(auth()->user()->id);
        
        if(is_null($user)){
            return $this->sendValidationError('User not found!');       
        }

        return $this->sendResponse(new UserResource($user), 'User get successfully.');
    }
}
