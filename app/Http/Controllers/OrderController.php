<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function showNewOrders()
    {
        //$newOrders1 = Order::whereNotNull('Cancel')->get();

        $newOrders = Order::where([['Cancel',""],
            ['status',0]])->get();
//        echo "found";
        $ordersDetail= array();
        foreach ($newOrders as $newOrder){
            $items=$users = DB::table('cart_items')->where('order_id',$newOrder->id)->get();
            array_push($ordersDetail,$items);
        }

        return view('order.newOrders')->with('newOrders', $newOrders->all())
                                        ->with('ordersDetails',$ordersDetail);
    }
}
