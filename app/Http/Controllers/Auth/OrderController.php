<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class OrderController extends Controller
{
    protected $user;
    protected $case = ['confirm','requirement','end'];
    //Show Case
    public function case($case,Order $order){
        if(!in_array($case,$this->case)){
           return abort(404); 
        }
        $product    = $order->item->product;
        $freelancer = $order->freelancer;
     
        return view("auth.order.$case",compact('order','product','freelancer'));
    }

    //Action
    public function quick(Request $request,Product $product){
        $user  = Auth::user();
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
            return redirect()->route('auth.order.case',['confirm',$order] );
        }
    }

    public function pay(Request $request, Order $order){

        $data = $request->input();
        $data['state'] = 'payment';
        $data['pay_at']=  now();
        if(empty($request->has_invoice)){
            unset($data['invoice_name']);
            unset($data['invoice_email']);
            unset($data['invoice_tax']);
            unset($data['invoice_address']);
        }
        else if(empty($request->edit_invoice) || empty($request->invoice_name))
        {
            $user =  Auth::user();
            $data['invoice_name']    = $user->name;
            $data['invoice_email']   = $user->email;
            $data['invoice_address'] = $user->address;
        }
        $order->update($data);
        return redirect()->route('auth.order.case',['requirement',$order]);
    }

    public function request(Request $request, Order $order){
        $data = $request->input();
        $data['request_at']=  now();
        $order->update($data);
        return redirect()->route('auth.order.case',['end',$order]);
    }
   
}
