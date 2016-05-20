<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function cartitems(){

        return $this->hasMany(CartItem::class);
    }

}
