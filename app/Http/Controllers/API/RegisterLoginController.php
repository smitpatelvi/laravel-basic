<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\ImageUpload;
use App\Models\User;
use Validator;
use Auth;

class RegisterLoginController extends BaseController
{
     /**
     * This Method Create for Register Api
     *
     * @return 
     */
    public function register(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendValidationError($validator->errors()->first());       
        }

        $input = $request->all();

        if(!empty($request->photo)){  
            $input['photo'] = ImageUpload::upload('/upload/user/',$request->photo);  
        }

        $user = User::create($input);

        $success['id'] =  $user->id;
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['user_type'] =  1;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendValidationError($validator->errors()->first());       
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            auth()->user()->update(['device_token'=>$request->device_token ?? null]);
            $success['id'] =  $user->id;
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['user_type'] =  1;

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Wrong Email or Password.']);
        } 
    }
}
