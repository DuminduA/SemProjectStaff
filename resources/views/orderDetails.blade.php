<?php
use App\CartItem;
use App\Order;
use App\Customer;
?>

@extends('layouts.master')

@section('title')

@endsection
@section('contain')
    @include('includes.messageError')
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <h2><span class="blue-text text-darken-2">Order Detail</span></h2><br>
                <h3><span class="blue-grey-text text-darken-2">Order ID: {{$orderID}}</span></h3>
            </div>
        </div>
        <table class="striped">
            <thead>
            <tr>
                <th data-field="ID">Item ID</th>
                <th data-field="name">Item Name</th>
                <th data-field="category">Item Category</th>
                <th data-field="Price">Price of one Item</th>
                <th data-field="quantity">Ordered Quantity</th>
            </tr>
            </thead>
            <?php
                $items = CartItem::where('order_id',$orderID)->get();
                $order = Order::where('id',$orderID)->first();
                $status = $order->status;
                $cancel = $order->Cancel;
                $customer = Customer::where('id',$order->customer_id)->first();
            ?>
            <tbody>
            @foreach($items as $item)
                <tr >
                    <td> {{ $item->itemID }}</td>
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->category }}</td>
                    <td> {{ $item->sellPrice}}</td>
                    <td> {{ $item->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">

            @if($status==null&&$cancel==null)
            <div id="data">
                <h5> Customer Name : {{$customer->first_name}} {{$customer->last_name}} </h5>
                    Total Price : {{$order->totalPrice}}<br>
                    Total Quantity: {{$order->tolalQuantity}}<br>
                    Status : New Order<br>
                    {{--Due date : {{$requests[$i]->due}}<br><br>--}}
            </div>
            <div id="button">
                <div class="row">
                    <br><br>
                    <a id='accept' href="{{route('newAccept',['id'=>$orderID])}}" class="waves-effect waves-light btn">Accept</a>
                </div>
                <div class="row">
                    <a id='reject' href="{{route('newReject',['id'=>$orderID])}}" class="waves-effect pink btn">Reject</a>
                </div>
            </div>

            @elseif($status==true&&$cancel=="Proceeded")
                <div id="data">
                    <h5> Customer Name : {{$customer->first_name}} {{$customer->last_name}} </h5>
                    Total Price : {{$order->totalPrice}}<br>
                    Total Quantity: {{$order->tolalQuantity}}<br>
                    Status : Proceeded Order<br>
                    {{--Due date : {{$requests[$i]->due}}<br><br>--}}
                </div>
                <div id="button">
                    <div class="row">
                        <a id='cancel' href="{{route('proceedFinish',['id'=>$orderID])}}" class="waves-effect waves-light btn">Finish</a>
                    </div>
                    <div class="row">
                        <a id='cancel' href="{{route('proceedCancel',['id'=>$orderID])}}" class="waves-effect pink btn">Cancel</a>
                    </div>
                </div>

            @elseif($cancel=="Finished")
                <div id="data">
                    <h5> Customer Name : {{$customer->first_name}} {{$customer->last_name}} </h5>
                    Total Price : {{$order->totalPrice}}<br>
                    Total Quantity: {{$order->tolalQuantity}}<br>
                    Status : Finished Order<br>
                    {{--Due date : {{$requests[$i]->due}}<br><br>--}}
                </div>

            @elseif($cancel=="Cancelled")
                <div id="data">
                    <h5> Customer Name : {{$customer->first_name}} {{$customer->last_name}} </h5>
                    Total Price : {{$order->totalPrice}}<br>
                    Total Quantity: {{$order->tolalQuantity}}<br>
                    Status : Cancelled Order<br>
                    {{--Due date : {{$requests[$i]->due}}<br><br>--}}
                </div>
            @else
                <div id="data">
                    <h5> Customer Name : {{$customer->first_name}} {{$customer->last_name}} </h5>
                    Total Price : {{$order->totalPrice}}<br>
                    Total Quantity: {{$order->tolalQuantity}}<br>
                    Status : Return Request Order<br>
                    {{--Due date : {{$requests[$i]->due}}<br><br>--}}
                </div>
                <div id="button">
                    <div class="row">
                        <br><br>
                        <a id='accept' href="{{route('returnAccept',['id'=>$orderID])}}" class="waves-effect waves-light btn">Accept</a>
                    </div>
                    <div class="row">
                        <a id='reject' href="{{route('returnReject',['id'=>$orderID])}}" class="waves-effect pink btn">Reject</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
