<?php

namespace App\Classes;

use Session;

class Setting
{
    protected static $name =  '__AppSetting';
    public static function set($data)
    {
        session()->put(static::$name,$data);
        session()->save();
    }

    public static function get()
    {
        $info   =   session(static::$name);
        if (empty(session(static::$name))){
            static::set([
                'locale' => config('app.locale'),
                'currency' => config('app.currency'),
                'curr_symbol' => config('app.curr_symbol'),
                'local' =>config('app.local'),   
            ]);
        } 
        return (object)session(static::$name);
    }
}
