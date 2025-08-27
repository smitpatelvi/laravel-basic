<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Validator;
use Auth;
use Illuminate\Support\Str;
use DB;
use Hash;


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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors()->first());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->sendError('Unauthorised.', ['error' => 'Your email address is not registered.']);
        }

        // Generate secure unique token
        $token = hash('sha256', Str::random(60) . time());

        // Delete old tokens before inserting new one (prevents duplicates)
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email'      => $user->email,
            'token'      => $token,
            'created_at' => now(),
        ]);

        $data = [
            'email' => $user->email,
            'token' => $token,
            'reset_url' => url('reset-password', $token) . '?email=' . urlencode($user->email),
        ];

        try {
            Mail::send('auth.api_forgot_password', $data, function ($m) use ($user) {
                $m->from(config('mail.from.address'), config('mail.from.name', 'NT Septic'));
                $m->to($user->email, $user->name)->subject('Forgot Password');
            });

            return $this->sendResponse(['successMessage' => 'Reset password link sent via email.'], 'Reset password link sent via email.');
        } catch (\Exception $e) {
            return $this->sendError('Mail Error.', ['error' => $e->getMessage()]);
        }
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resetPassword(Request $request) {
        $memberObj = User::where('email', '=', $request->email)->first();
        $this->data['token'] = $request->slug;
        return view('auth.reset_password', $this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function updatePassword(Request $request) {
        $customMessages = [
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.same' => 'The passwords you entered do not match.'
        ];

        $this->validate($request, [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ],$customMessages);

        $customerObj = DB::table('password_resets')->where('token', '=', $request->token)->first();
        if (!$customerObj) {
            Session::flash('message', 'Something is wrong. Please contact administrator.');
            Session::flash('alert-class', 'alert-danger');
            $this->data['token'] = $request->token;
            return view('auth.reset_password', $this->data);
        }

        $data['password'] = bcrypt($request->password);
        $data['updated_at'] = NOW();
        User::where('email',$customerObj->email)->update($data);
        DB::table('password_resets')->where('email', '=', $customerObj->email)->delete();

        Session::flash('message', 'Your password has been changed successfully.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('success');
    }

    public function logout(Request $res)
    {
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return $this->sendResponse(null, 'Logout successfully.');
        
      }else {
        
        return $this->sendError('Unauthorised.', ['error'=>'unable to logout.']);
      }
    } 
}
