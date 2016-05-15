

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
                    <label for="itemID">Item ID NO.</label>
                    <input class="validate " type="text" name="itemID" id="itemID" required>
                </div>
                <div class="input-field col s6">
                    <label for="name">Item Name</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="input-field col s6">
                    <label for="category">Category</label>
                    <input class="form-control" type="text" name="category" id="category" required>
                </div>

                <div class="input-field col s6">
                    <label for="buyPrice">Buying Price of one item</label>
                    <input class="validate" type="number" name="buyPrice" id="buyPrice" required>
                </div>
                <div class="input-field col s6">
                    <label for="sellPrice">Selling Price of one item</label>
                    <input class="validate" type="number" name="sellPrice" id="sellPrice" required>
                </div>
                <div class="input-field col s6">
                    <label for="count">Quantity</label>
                    <input class="validate  " type="number" name="count" id="count">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <a href="{{ URL::to('updateItems') }}" class="btn btn-primary">Display Table</a>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
            </form>

        </div>

    </div>
@endsection
