<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;


class Like extends Component
{

    public $item;
    public $liked;
    public $user;
    public $count = 0;
    public $class;
    public function like()
    {
        $this->liked = $this->item->liked($this->user);
        //$this->count  =  $this->item->likes->count();
        if ($this->liked) {
            $this->count++;
        } else {
            $this->count--;
        }
    }

    public function render()
    {
        //$this->liked   =   false;
      
        $this->user   =  auth()->user();

        if ($this->user) {
            $like  =  $this->item->getLike($this->user);
            $this->liked = empty($like) ? false :  true;
        } else {
            $this->liked   =   false;
        }

        return view('livewire.auth.like');
    }
}
