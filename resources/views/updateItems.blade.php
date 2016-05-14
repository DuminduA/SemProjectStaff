@extends('layouts.master')

@section('title')

@endsection
@section('contain')
    @include('includes.messageError')

    <div class="row">
        <div class="row">
            <div class="card-panel">
                <h2><span class="blue-text text-darken-2">Inventory Items Table</span></h2>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th data-field="itemID">Item ID</th>
                <th data-field="name">Item Name</th>
                <th data-field="category">Item Category</th>
                <th data-field="buyPrice">Buying Price</th>
                <th data-field="sellPrice">Selling Price</th>
                <th data-field="count">Quantity</th>
                <th>
                    <table>
                        <th data-fiels="action"></th>
                    </table>
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($items as $item)
                <tr >
                    <td> {{ $item->itemID }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td> {{ $item->buyPrice }}</td>
                    <td>{{ $item->sellPrice }}</td>
                    <td>{{ $item->count }}</td>
                    <td>
                    <td> <a href="{{ route('item.edit',['itemID'=>$item->itemID]) }}">Edit</a></td>
                    <td> <a href="{{ route('item.delete',['itemID'=>$item->itemID]) }}">Delete </a></td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <input type="hidden" name="_token" value="{{ Session::token()}}">
        </div>

    </div>

@endsection
