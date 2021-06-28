<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Device;
use Hash;

class AppController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function access(Request $request)a
     {
       $data       = $request->input();
       $validator  =  Validator::make($data,[
         'app'    => 'required|string',
         'secret' => 'required|string',
         'id'     => 'required|string'
       ]);

       if(!$this->accept($request->app,$request->secret)){
          $validator->getMessageBag()->add('access', 'no right!');
       }
       if ($validator->fails()) {
           return response()->json($validator->messages());
       }

       $token  =  Hash::make(uniqid($request->id).Str::random(24));
       $token  =  hash('sha256', $token);
       $data['access_token'] = $token;
       $data['access_at']    =  now();

       $device =  Device::find($request->id);
       if(empty($device)){
          $data['app_version']  = env('APP_VERSION');
          $device = Device::create($data);
       }else{
          $device->update($data);
       }

       return response()->json([
           'access-token' => $token,
           'version'      => env('APP_VERSION'),
           'redirect'     => route('app.login',['token'=>$token])
       ], 200);
     }

     public function login(Request $request){

         $token   = $request->header('Access-Token');

         $device  = Device::findToken($token);

         if(empty($device)){
            return response()->json([
              'message' => 'need access Token',
            ]);
         }
         $data       = $request->input();
         $validator  =  Validator::make($data,[
           'firebase_uid'    => 'required|string|min:3',
           'firebase_token'  => 'required',
           'email'           => 'required|string|email',
         ]);

         if ($validator->fails()) {
             return response()->json($validator->messages());
         }
         $data['login_at'] = now();

         $user = User::whereEmail($request->email)->first();
         if(empty($user)){
             $data['name'] = empty($request->name) ? $request->email : $request->name;
             $data['password'] =  Hash::make(Str::random(24));
             $user = User::create($data);
         }else{
             unset($data['name']);
             $user->update($data);
         }

         $device->update([
           'user_id'    =>  $user->id,
           'login_at'  =>   $user->login_at,
         ]);

         return response()->json([
           'state'    => true,
           'redirect' => route('app.main',['token'=>$token])
         ],200);
     }

     function accept($app,$secret){
        return ( $app == env('APP_NAME') && $secret == 'base64:'.env('APP_KEY'))  ? true :false;
     }

}
