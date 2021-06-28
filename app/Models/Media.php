<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getSrcAttribute()
    {
        return asset("media/$this->path/$this->name");
    }


    public function model()
    {
        return $this->morphTo();
    }
    public function change($file)
    {
        $ext  = $file->getClientOriginalExtension();
        $type = empty($file->type) ? 'img' : $file->type;
        Storage::disk('media')->delete($this->path . "/$this->name");
        $this->update([
            'ext'   => $ext,
            'name'  => "$this->code.$ext",
            'path'  => $type,
        ]);

        $file->storeAs($type, $this->name, 'media');
    }

    public static function up($file, $owner)
    {
        $ext  = $file->getClientOriginalExtension();
        $type = empty($file->type) ? 'img' : $file->type;
        $code   =  uniqid();
        $media  = Media::create([
            'ext'   => $ext,
            'name'  => "$code.$ext",
            'path'  =>  $type,
            'model_type'  =>  get_class($owner),
            'model_id'    =>  $owner->id,
            'code'        =>  $code,
        ]);

        if ($media) {
            $file->storeAs($type, $media->name, 'media');
            return $media;
        }
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            //dd($model->src);
            Storage::disk('media')->delete($model->src);
        });

        static::saving(function ($model) {
            if (empty($model->code)) {
                $model->code = uniqid();
            }
        });
    }
}
