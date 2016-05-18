<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class Customer extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
//
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function customerrequests(){
        return $this->hasMany('App\CustomerRequest');
    }
}
 