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
        ]);
        $string = $request['search'];
        $item = Item::where('name',$string)->first();
        if (!isset($item)){
            $items=array();
            $heading = '"Item Not Found"';
            return view('searchItem', ['items' => $items,'heading'=>$heading]);
        }
        $items = array();
        $items[] = $item;
        $heading = 'Available Items';
        return view('searchItem', ['items' => $items,'heading'=>$heading]);
    }

    public function getsearchItem(){
        $items = Item::all();
        $heading = 'Available Items';
        return view('searchItem',['items'=>$items,'heading'=>$heading]);
    }


    public function getUpdateItems(){
        $items = Item::all();
        return view('updateItems',['items'=>$items]);
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
            'count' => 'required'
        ]);
        $staff=Auth::user();
        $item = new Item();
        $item->itemID = $request['itemID'];
        $item->name = $request['name'];
        $item->category = $request['category'];
        $item->buyPrice = $request['buyPrice'];
        $item->sellPrice = $request['sellPrice'];
        $item->count = $request['count'];
        $staff->items()->save($item);
        $massage = 'There was an error';
        if ($item->save()){
            $massage = 'Item added successfully';
        };


        return redirect()->route('newItem')->with(['message' => $massage]);
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
            'count' => 'required'
        ]);

        $item = new Item();
        $staff=Auth::user();
        $item->itemID = $request['itemID'];
        $item->name = $request['name'];
        $item->category = $request['category'];
        $item->buyPrice = $request['buyPrice'];
        $item->sellPrice = $request['sellPrice'];
        $item->count = $request['count'];
        $staff->items()->save($item);

        return redirect()->route('updateItems');
    }

}