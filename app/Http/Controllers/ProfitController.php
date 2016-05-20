<?php

namespace App\Http\Controllers;

use App\Item;
use App\Profit;
use App\ProfitData;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfitController extends Controller
{
    public function addProfit(Request $request){

        $orderId=$request['orderId'];
        $year=date('Y');
        $month=date('M');
        $date=date('D');
        $profitId=Profit::count()+1;
        $items=DB::table('cart_items')->where('order_id',$orderId)->get();
        $profit=0;
        $totalQuantity=0;
        foreach ($items as $item){
            $quantity=$item->quantity;
            $totalQuantity+=$quantity;
            $realItem = Item::where('id',$item->iTemId);
            $itemProfit=(($realItem->sellPrice)-($realItem->buyPrice))*$quantity;
            $profit+=$itemProfit;
            addProfitData($realItem->id,$quantity,$itemProfit,$profitId,$quantity);
        }

        $profitobj= new Profit();
        $profitobj->year=$year;
        $profitobj->month=$month;
        $profitobj->date=$date;
        $profitobj->profit=$profit;
        $profitobj->order_id=$orderId;
        $profitobj->quantity=$$totalQuantity;

    }
    public function addProfitData($itemId,$soleQuantity,$profit,$profitId,$quantity){

        $profitData= new ProfitData();

        $profitData->profit_id=$profitId;
        $profitData->profit=$profit;
        $profitData->item_id=$itemId;
        $profitData->quantity=$quantity;
        $profitData->save();
    }
    public function getProfitOfday($year,$month,$date){

        $profits=Profit::where([['year',$year],
            ['month',$month],
            ['date',$date]]);

        $profitOfDate=0;
        foreach ($profits as $profit){

            $profitOfDate+=$profit->profit;
        }
        return $profitOfDate;
    }
    public function getProfitOfMonth($month, $year){

        $noOfDays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $profit=0;
        for($x=1;$x<=$noOfDays;$x++){

            $profit+=getProfitOfday($year,$month,$x);

        }
    }
    public function getProfitOfYear($year){

        $profit=0;
        for($x=0;$x<=12;$x++){
            
            $profit+=getProfitOfMonth($x, $year);
        }
    }
}
