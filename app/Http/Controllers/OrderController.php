<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function showNewOrders(){
        $newOrders=Order::where('Cancel',null)->get();
        echo "found";
        return view('order/newOrders')->with('newOrders',$newOrders->all());
    }
}
