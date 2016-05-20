<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitData extends Model
{
    public function Profit(){
        
        $this->belongsTo('App\Profit');
    }
}
