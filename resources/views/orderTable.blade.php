<?php
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
                <h2><span class="blue-text text-darken-2">{{ $heading }}</span></h2>
            </div>
        </div>
        <table class="striped">
            <thead>
            <tr>
                <th data-field="ID">Order ID</th>
                <th data-field="name">Customer Name</th>
                <th data-field="totalPrice">Total Price</th>
                <th data-field="Status">Status</th>
                <th data-field="placeDate">Ordered Date</th>
                <th data-field="action"></th>

            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
                <tr >
                    <td> {{ $order->id }}</td>
                    <td>
                        <?php   $cus= Customer::where('id',$order->customer_id)->first();

                        ?>
                        {{$cus->first_name}} {{$cus->last_name}}
                    </td>
                    <td>LKR. {{ $order->totalPrice }}</td>
                    <td>
                        @if(($order->Cancel=="New Order"))
                            New Order
                        @elseif(($order->Cancel=="Proceeded"))
                            Proceeded Order
                        @elseif(($order->Cancel=="Returned"))
                            Returned Order
                        @elseif($order->Cancel=="Cancelled")
                            Cancelled Order
                        @elseif($order->Cancel=="Finished")
                            Finished Order
                        @endif
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td><a class="waves-effect pink btn" href="{{route('orderDetail',['id'=>$order->id])}}">Action</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
