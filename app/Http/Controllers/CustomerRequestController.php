<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Customer;
use App\CustomerRequest;
use Mockery\Exception;

class CustomerRequestController extends Controller{

    public function placeRequest(Request $request){

        $this->validate($request,[
            'name' => 'required|max:20',
            'discribe' => 'required|max:20',
            'quantity' => 'required',
            'due' => 'required',
        ]);
        $place = new CustomerRequest();
        $place->name = $request['name'];
        $place->discribe = $request['discribe'];
        $place->quantity = $request['quantity'];
        $place->due = $request['due'];
        $place->status=1;
        $customer = Auth::user();
        $place->customer_id = $customer->id;
        $place->save();
        $heading = "Available Item";
        $items = Item::all();
        return view('searchItem', ['items' => $items,'heading'=>$heading]);

    }

    public function request(){
        return view('request');
    }

    public function displayRequest(){
        $request = CustomerRequest::all();
        foreach ($request as $re){
            if ($re->status==1){
                $requests[]=$re;
            }
        }
        if (!isset($requests)){
            $requests=array();
            $customers=array();
            $heading = "No Requests";
            return view('staffRequest', ['requests' => $requests,'customers'=>$customers,'heading'=>$heading]);
        }
        $customers =array();
        foreach ($requests as $requ){
            $customers[]= Customer::where('id',$requ->customer_id)->first();
        }
        $heading = 'Customer Request Table';
        return view('staffRequest',['requests'=>$requests,'customers'=>$customers,'heading'=>$heading]);
    }

    public function requestsearch(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $check=Customer::all();
        if (sizeof($check)==0){
            $requests=array();
            $customers=array();
            $heading = "No Requests.";
            return view('staffRequest', ['requests' => $requests,'customers'=>$customers,'heading'=>$heading]);
        }
        $string = $request['search'];
        $customer = Customer::where('first_name', $string)->first();
        if (!isset($customer)){
            $requests=array();
            $customers=array();
            $heading = $string." is not a customer.";
            return view('staffRequest', ['requests' => $requests,'customers'=>$customers,'heading'=>$heading]);
        }
        $customers[]=$customer;
        $request = CustomerRequest::where('customer_id', $customer->id)->get();
        foreach ($request as $re){
            if ($re->status==1){
                $requests[]=$re;
            }
        }
        if (!isset($requests)){
            $requests=array();
            $customers=array();
            $heading = "No Request From ".$string;
            return view('staffRequest', ['requests' => $requests,'customers'=>$customers,'heading'=>$heading]);
        }
        $heading = 'Customer Request Table';
        return view('staffRequest', ['requests' => $requests,'customers'=>$customers,'heading'=>$heading]);
    }

    public function complete($ID){
        CustomerRequest::where('id',$ID)->update(['status'=>2]);
        return redirect()->route('displayRequest');
    }
    
    public function reject($ID){
        CustomerRequest::where('id',$ID)->update(['status'=>3]);
        return redirect()->route('displayRequest');
    }
    
    public function oldRequest(){

        $requests = CustomerRequest::all();
        foreach ($requests as $request){
            if ($request->status==2){
                $complete[]=$request;
            }
            if ($request->status==3){
                $reject[]=$request;
            }
        }
        if (!isset($complete)&&!isset($reject)) {
            $complete = array();
            $reject =array();
            $comcus=array();
            $rejcus=array();
            $heading = "No Old Requests";
            return view('staffRequest', ['complete' => $complete,'reject'=>$reject,'comcus'=>$comcus,'rejcus'=>$rejcus,'heading' => $heading]);
        }
        $comcus =array();
        $rejcus=array();
        foreach ($complete as $com){
            $comcus[]= Customer::where('id',$com->customer_id)->first();
        }
        foreach ($reject as $rej){
            $rejcus[]= Customer::where('id',$rej->customer_id)->first();
        }
        $heading = "Old Requests";
        return view('oldRequest',['complete' => $complete,'reject'=>$reject,'comcus'=>$comcus,'rejcus'=>$rejcus,'heading' => $heading]);
    }
    
}   