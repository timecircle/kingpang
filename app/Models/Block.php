<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasMedia;

class Block extends Model
{
    use HasFactory;
    use HasMedia;
    protected $guarded  = ['id'];
    protected $touches  = ['avatar'];

    public function model()
    {
        return $this->morphTo();
    }

    public static function pull($code, $prefix = null){
       return  static::where('code','like',"$code%")->wherePrefix($prefix);
    }
    public function scopeSearch($query,$search){
       
        if(isset($search->code)){
            $query->where('code','like',"%$search->code%");
        }
        if(isset($search->title)){
            $query->where('tite','like',"%$search->title%");
        }

        return $query;
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            foreach ($model->medias as $media) {
                $media->delete();
            }
        });

        static::saving(function ($model) {
            if (empty($model->code)) {
                $model->code  = uniqid();
            }
        });
    }
}
