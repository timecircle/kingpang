<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use Closure;

class AppDevice
{
   public function handle($request, Closure $next)
   {
       $device =  Device::findToken($request->token);
       if(empty($device)) return abort(404);
       $request->device = $device;

       if($device->login_at){
          Auth::loginUsingId($device->user_id);
       }

       return  $next($request);
   }

}
