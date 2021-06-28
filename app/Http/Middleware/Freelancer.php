<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use AppSetting;
class Freelancer
{

  public function handle($request, Closure $next)
   {
       if ( Auth::check()  &&  Auth::user()->freelancer ) {
           return $next($request);
       }
      return abort(404);
   }
}
