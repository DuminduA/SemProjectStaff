@extends('layouts.master')

@section('title')

@endsection
@section('contain')
    @include('includes.messageError')

    <div class="row">
        <div class="col col-lg-2">
            <div class="title">
                <h2> Edit Item </h2>
            </div>
            <form action="{{route('addEditItem',['item'=>$item])}}" method="post">
                <div class="input-field col s6 '' }}">
                    <label for="itemID" class="active">Item ID </label>
                    <input class="form-control" type="text" name="itemID" id="itemID" value="{{ $item->itemID }}">

                </div>
                <div class="input-field col s6">
                    <label for="name" class="active">Item Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $item->name }}">
                </div>
                <div class="input-field col s6">
                    <label for="category"class="active">Category</label>
                    <input class="form-control" type="text" name="category" id="category" value="{{ $item->category }}">
                </div>

                <div class="input-field col s6">
                    <label for="buyPrice" class="active">Buying Price of one item</label>
                    <input class="validate" type="number" name="buyPrice" id="buyPrice" value="{{ $item->buyPrice }}">
                </div>
                <div class="input-field col s6">
                    <label for="sellPrice" class="active">Selling Price of one item</label>
                    <input class="validate" type="number" name="sellPrice" id="sellPrice" value="{{ $item->sellPrice }}">
                </div>
                <div class="input-field col s6">
                    <label for="quantity" class="active">Quantity</label>
                    <input class="validate " min="1" type="number" name="quantity" id="quantity" value="{{ $item->quantity }}">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
            </form>
            <div class="row">
                <a href="{{route('updateItems')}}" class="btn btn-primary">Back</a>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
            </div>
        </div>

    </div>
@endsection