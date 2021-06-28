<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
use Hash;
class Register extends Component
{

    public $password;
    public $email;
    public $name;
    public $ok = false;

    protected $rules = [
            'password' => 'required|min:6|max:191',
            'email'    => 'required|email|max:191',
        ];
    public function sw(){
        $this->ok = false;
    }

   
  
    public function register()
    {
        if( User::whereEmail($this->email)->exists() ){
            $this->addError('email', 'email is exits');
        }else{
            $this->ok = true;

            $validatedData = $this->validate();
            Auth::login(User::create([
                        'name' => empty($this->name) ? $this->email : $this->name ,
                        'email' => $this->email,
                        'password' => Hash::make($this->password),
                    ]
                )
            );
            if( Auth::check() ){
                return redirect()->route('auth.info');
            }
        }

    }
    public function render()
    {
        return view('livewire.auth.register');
    }

}
