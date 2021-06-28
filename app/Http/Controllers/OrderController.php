<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Freelancer;
use Auth;
class OrderController extends DevController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Freelancer $freelancer)
    {
      $status= request('state',null);
      $query = Order::whereFreelancerId($freelancer->id);
      if($status){
        $query->whereState($status);
      }
      $query->orderByDesc('created_at');
      return view('dev.order.index',compact('freelancer','query'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dev.order.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dev.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->data = $request->input();
        switch ($request->act) {
          case 'accept':
              $order->accept_at  = now();
              $back = ['status'=>'success','message'=>'accepted!'];
            break;
          case 'refuse':
              $order->refuse_at  = now();
              $back = ['status'=>'success','message'=>'declined!'];
            break;
          case 'cancel':
              $order->cancel_at  = now();
            break;

          default:
              $back =['status'=>'success','message'=>'updated!'];
            break;
        }
        $order->update($this->data);
        return $this->back($back);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
      $order->delete();
      return $this->back(['status'=>'success','message'=>'Record deleted!']);
    }


}
