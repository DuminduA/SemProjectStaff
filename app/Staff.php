<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Staff extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function items(){
        return $this->hasMany('App\Item');
    }
}

