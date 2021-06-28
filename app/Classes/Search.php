<?php

namespace App\Classes;

use Session;
use App\Models\Product;

class Search
{
    protected $name =  '__search';
    protected $model;
    public function  __construct($model)
    {
        $this->model= $model;  
        $this->name = $model . $this->name;
        if (empty($this->get())) $this->clear();
    }

    public function set($input)
    {
        session()->put($this->name,$input);
        session()->save();
    }

    public function get()
    {
        return (object)session($this->name);
    }

    public function clear()
    {
        session()->put($this->name,[]);
        session()->save();
    }
}
