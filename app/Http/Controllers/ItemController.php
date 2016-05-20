<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Mockery\Exception;
use Auth;


class ItemController extends Controller{

    public function search( Request $request){
        $this->validate($request,[
            'search' => 'required',
            'searchOption' => 'required'
        ]);
        $check=Item::all();
        if (sizeof($check)==0){
            $items=array();
            $heading = '"No Item in the Inventory"';
            return view('updateItems', ['items' => $items,'heading'=>$heading]);
        }
        $string = $request['search'];
        $option = $request['searchOption'];
        if($option==1) {
            $items = Item::where('name', $string)->get();
        }else{
            $items = Item::where('category', $string)->get();
        }
        if (!isset($items)){
            $items=array();
            $heading = '"Item Not Found"';
            return view('updateItems', ['items' => $items,'heading'=>$heading]);
        }

        $heading = 'Inventory Items';
        return view('updateItems', ['items' => $items,'heading'=>$heading]);
    }

    public function getUpdateItems(){
        $items = Item::all();
        $heading = 'Inventory Items';
        return view('updateItems',['items'=>$items,'heading'=>$heading]);
    }

    public function getNewItem(){
        return view('newItem');
    }


    public function addNewItem(Request $request){

        $this->validate($request,[
            'itemID' => 'required|unique:items',
            'name' => 'required|max:20',
            'category' => 'required|max:20',
            'buyPrice' => 'required',
            'sellPrice' => 'required',
            'quantity' => 'required'
        ]);
        $staff=Auth::user();
        $item = new Item();
        $item->itemID = $request['itemID'];
        $item->name = $request['name'];
        $item->category = $request['category'];
        $item->buyPrice = $request['buyPrice'];
        $item->sellPrice = $request['sellPrice'];
        $item->quantity = $request['quantity'];
        $item->staff_id = $staff->id;
        $message = 'There is an error.';
        $item->save();
        if ($item->save()){
            $message = 'Successfully added';
        }
        return redirect()->route('newItem')->with(['message'=> $message]);
    }

    public function deleteItem($itemID){
        $item = Item::where('itemID',$itemID)->first();
        $item->delete();
        return redirect()->route('updateItems')->with(['message'=>'Successfully Deleted']);
    }

    public function editItem($itemID){
        $item = Item::where('itemID',$itemID)->first();
        return view('editItem',['item'=>$item]);
    }

    public function addEditItem(Request $request,Item $item){
        $item->delete();
        $this->validate($request,[
            'itemID' => 'required|unique:items',
            'name' => 'required|max:20',
            'category' => 'required|max:20',
            'buyPrice' => 'required',
            'sellPrice' => 'required',
            'quantity' => 'required'
        ]);
        $staff=Auth::user();

        $item = new Item();
        $item->itemID = $request['itemID'];
        $item->name = $request['name'];
        $item->category = $request['category'];
        $item->buyPrice = $request['buyPrice'];
        $item->sellPrice = $request['sellPrice'];
        $item->quantity = $request['quantity'];
        $staff->items()->save($item);

        //Item::where('id',$item->id)->update(['staff_id'=>$staff->id,'itemID'=>$request['itemID'],'name'=> $request['name'],'category'=> $request['category'],'buyPrice'=>$request['sellPrice'],'quantity'=> $request['quantity']]);

        return redirect()->route('updateItems');
    }

}