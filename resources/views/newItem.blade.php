

@extends('layouts.master')

@section('title')

@endsection
@section('contain')
    @include('includes.messageError')

    <div class="row">
        <div class="col col-lg-2">
            <div class="title">
                <h2> New Item </h2>

            </div>
            <form action="{{route('addNewItem')}}" method="post">
                <div class="input-field col s6 ">
                    <label for="itemID" class="active">Item ID NO.</label>
                    <input class="validate " type="number" name="itemID" id="itemID" required>
                </div>
                <div class="input-field col s6">
                    <label for="name" class="active">Item Name</label>
                    <input class="active" type="text" name="name" id="name" required>
                </div>
                <div class="input-field col s6">
                    <label for="category" class="active">Category</label>
                    <input class="active" type="text" name="category" id="category" required>
                </div>

                <div class="input-field col s6">
                    <label for="buyPrice" class="active">Buying Price of one item</label>
                    <input class="validate" type="number" name="buyPrice" id="buyPrice" required>
                </div>
                <div class="input-field col s6">
                    <label for="sellPrice" class="active">Selling Price of one item</label>
                    <input class="validate" type="number" name="sellPrice" id="sellPrice" required>
                </div>
                <div class="input-field col s6">
                    <label for="quantity" class="active">Quantity</label>
                    <input class="validate  " min="1" type="number" name="quantity" id="quantity">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
            </form>

        </div>
    </div>
@endsection
