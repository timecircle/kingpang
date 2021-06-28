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

class PageController extends Controller
{

  public function order(User $user)
  {
    $query = Order::whereUserId($user->id);
    return view('auth.order', compact('query', 'user'));
  }
  public function favorites(User $user)
  {
    return view('auth.favorites', compact('user'));
  }

  public function notify(User $user)
  {
    return view('auth.notify', compact('user'));
  }
  public function chat(User $user)
  {
    return view('auth.chat', compact('user'));
  }
  public function setting(User $user)
  {
    return view('auth.setting', compact('user'));
  }
  public function transactions(User $user)
  {
    return view('auth.transactions', compact('user'));
  }

  public function reward(User $user)
  {
    return view('auth.reward', compact('user'));
  }

  public function join(User $user)
  {
    if (empty($user->freelancer))
      return view('auth.join', compact('user'));
    return redirect()->route('freelancers.services', $user->freelancer->id);
  }
}
