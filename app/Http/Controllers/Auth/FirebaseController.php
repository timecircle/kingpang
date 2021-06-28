<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\DevController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
use Hash;
class FirebaseController extends DevController
{
  protected $reg  = [
      'firebase_uid'    => 'required|string|min:3',
      'firebase_token'  => 'required',
      'email'  => ['required', 'string', 'email', 'max:191'],
  ];

    public function login(Request $request){
        $this->data = $request->input();
        if($this->validator()->fails()) return $this->backErr();
        $this->data['login_at'] = now();

        $user = User::whereEmail($request->email)->first();
        if(empty($user)){
            $this->data['name'] = empty($request->name) ? $request->email : $request->name;
            $this->data['password'] = Hash::make(Str::random(24));
            $user = User::create($this->data);
        }else{
          unset($this->data['name']);
          $user->update($this->data);

        }

        return $this->beforeLogin($user);

    }

    function beforeLogin($user){
        Auth::loginUsingId($user->id);
        /*
        if( url()->previous() == route('app.welcome')){
            return router('app.home');
        }
        */
        return redirect()->back();
    }

}
