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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function changeEmailUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'current_email'=> 'required|email',
            'confirm_email'=> 'required|email|same:new_email',        
            'new_email' => 'required|email|unique:users,email,' . auth::guard('api')->user()->id,
            //'new_email' => ['required','email',new UniqueEmailForRoles(auth::guard('api')->user()->user_type, auth::guard('api')->user()->company_id, auth::guard('api')->user()->id),],        
        ],[
                'confirm_email.same'=> 'The email confirmation does not match your new email address.',
                'new_email.unique'=> 'That email address is taken. Try another'
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors()->first());
        }
        if(auth::guard('api')->user()->email == $request->current_email)
        {
            auth::guard('api')->user()->update(['email' => $request->new_email]);
            return $this->sendResponse([], 'User Email Update Successfully.');    
        }
        else
        {
            return $this->sendValidationError('The current email address does not exist.');     
        }
        
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' => 'required|min:6|same:new_password'
        ],[
            'new_password.regex'=> 'Your password is weak. Make it stronger by including at least one capital letter, a number, and a special character.',
            'new_password.min'=> 'Your password is weak. Make it stronger by including at least one capital letter, a number, and a special character.'
        ]); 

        if ($validator->fails()) {
             return $this->sendValidationError($validator->errors()->first());
        }
        else
        {   
            $id = Auth::guard('api')->user()->id;   
            $user = User::where('id',$id)->first();
            if(isset($user))
            {
                $old_pass = $request->current_password;
                $new_pass = $request->new_password;
                $confirm_pass = $request->confirm_password;

                if(Hash::check($old_pass,$user->password))
                {
                    $new = bcrypt($request->new_password);
                    $dat['password'] = $new;
                   // $dat['status']   = '1';
                    User::where('id',$user->id)->update($dat);
                    
                    return $this->sendResponse([], 'Password changed successfully.');
                }
                else
                {
                    return $this->sendValidationError('Your current password does not match.');
                }   
            }
        }       
    }

    public function profileUpdate(Request $request) {
        $input = $request->all();
                     
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors()->first());
        }

        $user = Auth::guard('api')->user();

        $user->update($input);
        $user['type'] = 'update';
        return $this->sendResponse(new UserResource($user), $this->crudMessage('update', 'User Profile'));
    }
}
