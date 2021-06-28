<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Freelancer;
class Choicefreelancer extends Component
{

  public $search = '';
  public $call   = 'choice';
  public function render()
  {
      $id   = uniqid();
      $list = User::whereDoesntHave('freelancer');
      if($this->search){
        $list = $list->where('email','like',"%$this->search%");
      }
      $list = $list->paginate();
      return view('livewire.auth.choicefreelancer',compact('id','list'));
  }

}
