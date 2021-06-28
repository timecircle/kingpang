<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
class Admin
{

    public function handle($request, Closure $next)
   {

       if(!Auth::check()) return redirect()->route('dev.login');
       $user  = Auth::user();
       //if(!$user->is_admin) return redirect()->route('home');
       return $next($request);
   }
}
