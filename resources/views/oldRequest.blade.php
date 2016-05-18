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
        <table>
            <thead>
            <tr>
                <th data-field="complete">Completed</th>
                <th data-field="reject">Rejected</th>

                <th>
                    <table>
                        <th data-fiels="action"></th>
                    </table>
                </th>
            </tr>
            </thead>
            <tbody>

                <tr >
                    <td>
                        @for($i=0;$i<sizeof($complete);$i++)
                            <div id="data">
                                <h6> Item Name: {{$complete[$i]->name}}  </h6>
                                Breif Discription : {{$complete[$i]->discribe}}<br>
                                Requested by: {{$comcus[$i]->first_name}} {{$comcus[$i]->last_name}}<br>
                                Quantity of Item request : {{$complete[$i]->quantity}}<br>
                                Requested Date : {{$complete[$i]->updated_at}}<br>
                                Due Date : {{$complete[$i]->due}}<br><br>

                            </div>
                        @endfor
                    </td>
                    <td>
                        @for($i=0;$i<sizeof($reject);$i++)
                            <div id="data">
                                <h6> Item Name: {{$reject[$i]->name}}  </h6>
                                Breif Discription : {{$reject[$i]->discribe}}<br>
                                Requested by: {{$rejcus[$i]->first_name}} {{$rejcus[$i]->last_name}}<br>
                                Quantity of Item request : {{$reject[$i]->quantity}}<br>
                                Requested Date : {{$reject[$i]->updated_at}}<br>
                                Due Date : {{$reject[$i]->due}}<br><br>
                            </div>
                        @endfor
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
