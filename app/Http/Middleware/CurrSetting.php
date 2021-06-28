<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Session;
use App;
use App\Classes\Setting;
class CurrSetting
{
    
    public function handle($request, Closure $next)
    {
        $setting    =  Setting::get();
        app()->setLocale($setting->locale);
        return $next($request);
    }
}
