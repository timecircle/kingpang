<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\DevController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Device;
use Session;
use Auth;
class LoginController extends DevController
{
  protected $reg  = [
      'password' => 'required|min:6',
      'email'    => 'required|email',
  ];
  public function signIn(Request $request,$token){

      $this->data = $request->input();
      if($this->validator()->fails()) return $this->backErr();

      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          Device::findToken($token)->login(Auth::user());
          return redirect()->route('app.main',$token);
      }
      return redirect()->back();
  }

}
