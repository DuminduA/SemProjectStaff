@extends('layouts.master')


@section('contain')
    <table class="striped">
        <thead>
        <tr>
            <th data-field="date">date</th>
            <th data-field="sid">staff_id</th>
            <th data-field="attendance">attendance</th>
            <th data-field="arrival">arrival time</th>

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
            <td>{{$item->arrival_time}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection