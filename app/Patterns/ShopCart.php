<?php

namespace App\Patterns;
use Session;
use App\Models\Product;

class ShopCart
{
    public static function add($id,$request = null){
        $cart = ShopCart::cart();
        $quantity = isset($request->quantity) ? $request->quantity : 1;

        $key  = '_'.$id;
        if($request->options){
            $key  .='_'.$request->options;
        }
        if(array_key_exists($key,$cart)){
          $cart[$key]->quantity   += $quantity;
          $cart[$key]->product_id  = $id;
        }
        else {
          $i  = new \stdClass();
          $i->quantity    = $quantity;
          $i->product_id  = $id;
          $cart[$key]  = $i;
        }
        if($request->options){
          $cart[$key]->options = $request->options;
        }
        ShopCart::update($cart);
        return ShopCart::cart();
    }

    public static function change($id,$quantity){
        $cart = ShopCart::cart();
        $key  = '_'.$id;

        if(array_key_exists($key,$cart)){
          $cart[$key]->quantity    = $quantity;
        }
        else {
          $i  = new \stdClass();
          $i->quantity    = $quantity;
          $i->product_id  = $id;
          $cart[$key]  = $i;
        }
        ShopCart::update($cart);
        return ShopCart::cart();
    }

    public static function find($id){
        $cart = ShopCart::cart();
        $key  = "_$id";
        if(array_key_exists($key,$cart)){
            $item = Product::find($id);
            $cart[$key]->item = $item;
            $cart[$key]->price= $cart[$key]->quantity * $item->price;


            return $cart[$key];
        }
    }


    public static function update($items){
      session()->put('ShoppingCart',$items);
      session()->save();
    }

    public static function count(){
        /*
        $count  = 0;
        foreach (ShopCart::cart() as $i) {
          $count  +=$i->quantity;
        }
        */
        return count(ShopCart::cart());
    }

    public static function remove($id){
      $items = ShopCart::cart();
      unset($items[$id]);
      ShopCart::update($items);
    }

    public static function clear(){
      session()->put('ShoppingCart',[]);
      session()->save();
    }

    public static function view(){
        return array_map(function($i){
              $item = Product::find($i->product_id);
              if($item){
                $i->item  = $item;
                return $i;
              }
          },ShopCart::cart());
    }

    public static function cart(){
        if(session()->has('ShoppingCart')){
            if(is_array(session('ShoppingCart'))){
              return session('ShoppingCart');
            }
        }
        session()->put('ShoppingCart',[]);
        session()->save();
        return session('ShoppingCart');
    }
}
