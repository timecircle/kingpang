<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

use App\Models\User;
use App\Models\Link;
use Auth;
class ShowController extends Controller
{
    public function info(){
        $user = Auth::user();
        return view('auth.info',compact('user'));
    }
    public function index(){
        $user = Auth::user();
        return view('auth.index',compact('user'));
    }
    public function order(){
      $user = Auth::user();
      $list = Order::whereUserId($user->id)->paginate();
      $cols = ['service name','quantity','price','total','status'];
      return view('auth.order',compact('user','list','cols'));
    }
    public function favorites(){
      $user = Auth::user();
        return view('auth.favorites',compact('user'));
    }
    public function notify(){
      $user = Auth::user();
        return view('auth.notify',compact('user'));
    }
    public function reward(){
      $user = Auth::user();
        return view('auth.reward',compact('user'));
    }

    public function join(){
      if(empty(Auth::user()->freelancer))
        return view('auth.join')->with(['user'=>Auth::user()]);
      return redirect()->route('freelancer.info');
    }

}
