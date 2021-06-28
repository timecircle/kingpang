<?php

namespace App\Patterns;
use Session;
use App\Models\Device;

class Setting
{

    public static function get(){

        return session()->has('AppSetting') ?
            session('AppSetting') : static::set(new Device);
    }

    public static function set($info){
        if(empty($info)) $info  = new Device;
        session()->put('AppSetting',$info);
        session()->save();
        //dd(session('AppSetting'));
    }

}
