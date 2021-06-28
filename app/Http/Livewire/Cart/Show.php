<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Patterns\ShopCart;

class Show extends Component
{

  public $product;
  public $quantity;
  public $delivery;

  public function cal(){
      if($this->quantity == 0){
        $this->quantity =  1;
      }
      ShopCart::change($this->product,$this->quantity);
  }

  public function render()
  {
      
      $cart     = $this->cart();
      $price    = $this->quantity * $cart->item->price;
      $discount = 0;
      $tax      = 0;

      if(isset($cart->coupon)){
        $discount += $price * $cart->coupon;
      }
      if(isset($cart->voucher) ){
        $discount += $cart->voucher;
      }
      $total  = $price + $tax  - $discount ;
      $this->quantity = $cart->quantity;
      $this->delivery =  $cart->item->delivery;
      return view('livewire.cart.show',compact(
          'cart','discount',
          'price','total'
        ));
  }

  function cart(){
      return ShopCart::find($this->product);
  }

}
