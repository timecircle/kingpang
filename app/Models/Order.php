<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Patterns\Original;

class Order extends Original
{

    public function addItem($arr){
        $item = new OrderItem;
        $item->fill($arr);
        $item->order_id = $this->id;
        $item->save();
        return $item;
    }
    public function item(){
        return $this->hasOne(OrderItem::class);
    }

    public function freelancer(){
        return $this->belongsTo(Freelancer::class,'freelancer_id');
    }
}
