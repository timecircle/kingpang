<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasMedia;

class FreelancerExpe extends Model
{
    use HasFactory,HasMedia;
    protected $guarded  = ['id'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($model)
        {
            foreach ($model->medias as $media) {
                $media->delete();
            }
        });
        static::saving(function($model){
            if(empty($model->code)){
                $model->code  = uniqid();
            }
        });
    }
}
