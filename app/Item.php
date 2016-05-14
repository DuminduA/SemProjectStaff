<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
//    public function orders(){
//        return $this->belongsTo('App\Order');
//    }
    public function staff(){
        
        return $this->belongsTo('App\Staff');
    }
}
