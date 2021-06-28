<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Link;
use App\Traits\Slug;

trait HasLink
{
    use Slug;

    public function link()
    {

        //$relation   =   $this->morphOne(Link::class, 'model');
        /*
        if(empty($relation->id)){
            $slug   =   $this->slug;
            Link::create([
                'pretty'      =>  static::slug(empty($this->$slug) ? $this->code : $this->$slug),
                'model_type' =>  get_class($this),
                'model_id'   =>  $this->id
            ]);
            return $this->morphOne(Link::class, 'model');
        }
        */
        return $this->morphOne(Link::class, 'model');;
    }

    public function haslink()
    {
        if (empty($this->link)) 
            return $this->upLink();
        return $this->link;
    }

    function upLink()
    {
        $slug   =   $this->slug;
      
        return Link::create([
            'pretty'      =>  static::slug(empty($this->$slug) ? $this->code : $this->$slug),
            'model_type' =>  get_class($this),
            'model_id'   =>  $this->id
        ]);
    }

    function dropLink()
    {
        $this->link->delete();
    }
}
