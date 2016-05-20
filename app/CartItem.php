<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function orders(){

        return $this->belongsTo(Order::class);
    }

    public function items(){

        return $this->belongsTo(Item::class);

    }
}
