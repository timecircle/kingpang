<?php

namespace App\Http\Controllers\Dev;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Setting;

class LangController extends Controller
{
    protected $name =  '__search';
    public function trans($lang)
    {
        $info   =   Setting::get();
        $info->locale   =   $lang;
        Setting::set($info );
        return redirect()->back();
    }
}
