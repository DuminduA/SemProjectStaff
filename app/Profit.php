<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    public function profitData(){
        
       return $this->hasMany('App\ProfitData');
    }
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
