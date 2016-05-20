<?php
use App\attendance;
?>

@extends('layouts.master')

@section('contain')
<br/>

<?php $atdc=attendance::all(); ?>
<form>
    <div>
        <label>Select a Date</label>

        <select class="browser-default" name="cDate">
            <option value="" disabled selected></option>
            @foreach($atdc as $el)
                <tr>
                    <td>{{$el->date}}</td>
                    </tr>
            @endforeach
                <option name="counter" value="kok"></option>

        </select>
    </div>
</form>


    <br/> <br/>
    <table class="striped">
        <thead>
        <tr>
            <th data-field="date">date</th>
            <th data-field="sid">staff_id</th>
            <th data-field="attendance">attendance</th>
            <th data-field="arrival">arrival time</th>
            <th data-field="edit"></th>

        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$item->date}}</td>
            <td>{{$item->staff_id}}</td>
            <td>
                @if($item->attendance==1)
                    {{'present'}}
                @else
                    {{'absent'}}
                @endif
                 </td>
            <td>
            @if($item->arrival_time==000000)
                {{'-'}}
            @else
                {{$item->arrival_time}}
            @endif
            </td>
            <td><a href="{{route('attendance', ['att'=>$item->id]) }}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection