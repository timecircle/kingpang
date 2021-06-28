<?php
namespace App\Traits;
use App\Models\Media;
trait HasMedia
{
    public function medias(){
        return $this->morphMany(Media::class, 'model');
    }

    public function avatar(){
        return $this->belongsTo(Media::class);
    }

    public function doc(){
        return $this->morphOne(Media::class, 'model');
    }

    public function attach($file){
        if($this->doc){
            $this->doc->change($file);
        }else{
            $file->type = 'doc';
            Media::up($file,$this);
        }
    }

    public function upAvatar($file){
       $this->avatar_id  = Media::up($file,$this)->id;
       $this->save();
    }

    public function storeAvatar($file){
        if($this->avatar){
            $this->avatar->change($file);
        }else{
            $this->upAvatar($file);
        }
    }
    
}
