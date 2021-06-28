<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Patterns\ShopCart;
use App\Models\Product;
use App\Models\Order;
use Auth;
class CartController extends Controller
{

    public function add(Request $request,$product ){
        ShopCart::add($product ,$request);
        return redirect()->route('cart.show',$product);
    }

    public function quick(Request $request,Product $product){
        $user =  Auth::user();
        if(empty($user))
          return redirect()->back()->with('toastr',[
              'status'=>'failed','message'=> __('please login')
          ]);
        $data  =  $request->input();
        $data['name']     = uniqid();
        $data['user_id']  = $user->id;
        $data['freelancer_id']  =  $product->freelancer_id;
        $data['state'] =  'order';
        $order =  Order::create($data);
        if($order->id){
            $data['product_id'] =  $product->sell()->id;
            
            $item =  $order->addItem($data);
            $customer = $user->customerOf($product->freelancer_id,true);
            return redirect()->route('cart.end',$order);
        }
    }

    public function pay(Request $request, $product){
        if(!Auth::check()){
            return redirect()->back()->with('toastr',[
              'status'=>'failed','message'=>'Vui lòng đăng nhập để tiếp tục'
            ]);
        }
        $user =  Auth::user();
        $i    =  ShopCart::find($product);

        $discount = 0;
        $tax      = 0;
        if(isset($i->coupon)){
          $discount += $i->price * $cart->coupon;
        }
        if(isset($i->voucher) ){
          $discount += $i->voucher;
        }
        $total  = $i->price + $tax  - $discount ;

        $order =  Order::create([
            'user_id'       => $user->id,
            'freelancer_id' => $request->freelancer_id,
            'state'   => 'order',
            'total'   => $total,
            'discount'=> $discount,
            'name'    => uniqid(),
        ]);

        if($order->id){
            $item =  $order->addItem([
                'product_id'  => $i->item->sell()->id,
                'quantity'    => $i->quantity,
                'price'       => $i->price,
                'content'     => empty($i->content) ? '' :$i->content,
              ]);
            $customer = $user->customerOf($request->freelancer_id,true);
            return redirect()->route('cart.end',$order);
        }
    }

    public function end(Order $order){
        ShopCart::clear();
        if(!Auth::check()){
            return abort(404);
        }
        return view('page.cart.end',compact('order'));
    }

    public function show($product){

        $cart     = ShopCart::find($product);

        if(empty($cart)){
          return redirect()->route('home');
        }

        $price    = $cart->quantity * $cart->item->price;
        $discount = 0;
        $tax      = 0;
        if(isset($cart->coupon)){
          $discount += $price * $cart->coupon;
        }
        if(isset($cart->voucher) ){
          $discount += $cart->voucher;
        }
        $total  = $price + $tax  - $discount ;
        $freelancer =  $cart->item->freelancer;
        return view('page.cart.index',compact(
          'freelancer','product',
          'cart','discount',
          'price','total'));
    }

    public function clear(){
        ShopCart::clear();
    }



}
