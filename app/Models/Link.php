<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Post as Page;
use App\Models\Type;

class Link extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
   
/*
    public function page(){
      return Page::findLink($this->id);
    }

    public function type(){
        return Type::findName($this->type);
    }

    public function pageSave(array $data){
        $this->update($data);
        static::pageSaving($this->page(),$data)->save();
    }

    public static function pageCreate(array $data){
        $page = new Page(Link::create($data));
        $page = static::pageSaving($page,$data);
        $page->save();
        return $page;
    }

    public static function pages( $type = 'page'){
      return Page::q($type);
    }



    static function pageSaving($page,array $data){
        if(empty($data['type'])){
            $data['type'] = 'page';
        }
        if(empty($data['view'])){
            $type = $data['type'];
            $data['view'] = "page.$type.simple";
        }
        return $page->fill($data);
    }
  */

    public function model(){
        return $this->morphTo();
    }


    public static function findBy($pretty){
      return static::wherePretty($pretty)->first();
    }

    public static function new($owner,$pretty = 'name'){
        return static::create([
            'pretty'      =>  static::slug($owner->$pretty),
            'model_type'  =>  get_class($owner),
            'model_id'    =>  $owner->id
        ]);
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            if(empty($model->short)){
                $model->short = uniqid();
            }
            if(empty($model->pretty)){
                $model->pretty = $model->short;
            }else if(static::wherePretty($model->pretty)->exists()){
                $model->pretty .= '.'.uniqid();
            }
        });
    }

    public static function slug($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
      $str = preg_replace("/(đ)/", "d", $str);
      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
      $str = preg_replace("/(Đ)/", "D", $str);
      return  Str::slug(str_replace("&*#39;","",$str),'-');
    }


}
