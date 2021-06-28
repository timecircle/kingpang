<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Patterns\ShopCart;
use App\Models\Product;
use App\Models\Order;
use Auth;

class CartController extends Controller
{
  public function quick(Request $request, Product $product, $token = null)
  {
    $user  = Auth::user();
    $data  =  $request->input();
    $data['name']     = uniqid();
    $data['user_id']  = $user->id;
    $data['freelancer_id']  =  $product->freelancer_id;
    $data['state'] =  'order';
    //dd($data);
    $order =  Order::create($data);
    //dd(route('app.thank', [$token, $order]));
    if ($order->id) {
      $data['product_id'] =  $product->sell()->id;
      $item =  $order->addItem($data);
      $customer = $user->customerOf($product->freelancer_id, true);

      return redirect()->route('app.thank', $order);
    }
  }

  public function add(Request $request, $token, $product)
  {
    ShopCart::add($product, $request);
    return redirect()->route('app.cart', [$token, $product]);
  }

  public function pay(Request $request, $token, $product)
  {
    $i    =  ShopCart::find($product);
    $user =  Auth::user();

    $discount = 0;
    $tax      = 0;

    if (isset($i->coupon)) {
      $discount += $i->price * $cart->coupon;
    }
    if (isset($i->voucher)) {
      $discount += $i->voucher;
    }
    $total  = $i->price + $tax  - $discount;

    $order =  Order::create([
      'user_id'       => $user->id,
      'freelancer_id' => $request->freelancer_id,
      'state'   => 'order',
      'total'   => $total,
      'discount' => $discount,
      'name'    => uniqid(),
    ]);

    if ($order->id) {
      if ($request->hasFile('avatar')) {
        $order->upAvatar($request->avatar);
      }
      $item =  $order->addItem([
        'product_id'  => $i->item->sell()->id,
        'quantity'    => $i->quantity,
        'price'       => $i->price,
        'content'     => empty($i->content) ? '' : $i->content,
      ]);
      $customer = $user->customerOf($request->freelancer_id, true);
      ShopCart::clear();
      return redirect()->route('app.thank', [$token, $order]);
    }
    return redirect()->back()->with('toastr', [
      'status' => 'failed', 'message' => 'Error Payment!'
    ]);
  }
}
