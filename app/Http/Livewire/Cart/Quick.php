<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Product;

class Quick extends Component
{
  public $product;
  public $quantity=1;
  public $token;  
  public function cal(){
    if($this->quantity == 0){
      $this->quantity =  1;
    }

  }

  public function render()
  {
      return view('livewire.cart.quick');
  }

}
