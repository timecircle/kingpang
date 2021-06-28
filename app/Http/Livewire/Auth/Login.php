<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;

class Login extends Component
{
  public $password;
  public $email;
  public $redirect = null;
  public $ok = false;
  protected $rules = [
        'password' => 'required|min:6',
        'email'    => 'required|email',
     ];
  public function sw(){
    $this->ok = false;
  }
     
  public function login()
  {
    if( !User::whereEmail($this->email)->exists() ){
      $this->addError('email', 'email is not exits');
    }else{
      $this->ok = true;
      if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        return redirect($this->redirect);
      }else{
        $this->validate();
        $this->addError('password', 'Password is not correct');
      }
    }
    
  }
  public function render()
  { 
    if(empty($this->redirect))
      $this->redirect = url()->current();
    return view('livewire.auth.login');
  }

}
