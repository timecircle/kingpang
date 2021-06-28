<?php
namespace App\View;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Theme{
    static function script_p($k, $v){
      if(is_string($k)){
        return '<script src="'.url($k).'" type="'.$v.'" ></script>';
      }
      return '<script src="'.url($v).'" ></script>';
    }
    static function css_p($s){
      return '<link href="'.url($s).'" rel="stylesheet">';
    }

    public static function js($src){
        foreach ($src as $k=>$v) {
            echo Theme::script_p($k, $v);
        }
    }
    public static function css($srcs){
        foreach ($srcs as $s) {
            echo Theme::css_p($s);
        }
    }
    public static function url($para = null){
        $merg  = ($para) ? array_merge(request()->all(),$para) :request()->all() ;
        $query = http_build_query($merg);
        return empty($query) ? url()->current() : url()->current().'?'.$query;
    }

    public static function toastr(){
        if(session('toastr')){
            $toastr   = session('toastr');
            $mess     = "'".$toastr['message']."','Message',{positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'}";
            $mess     = "toastr.".$toastr['status']."(".$mess.")";
            echo '<script>'.$mess.'</script>';
        }
    }

    static function state(){
      return  empty(session('toastr')) ? null : session('toastr');
    }

    public static function loadOr( $hide ){
      if(static::state() ==  'success' ){
        return "parent.location.reload()";
      }
      return "parent.md_hide('$hide')";
    }

    public static function title($text){
      return Str::title(__($text));
    }

    
    public static function menuType(){
      return Category::root()->wherePrefix('service')->so()->get();
  }
}
