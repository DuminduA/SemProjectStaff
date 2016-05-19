@extends('layouts.master')

@section('title')

@endsection
<style>

    #data{
        float: left;
        width: 500px;

    }
    #button{
        float: right;
        right: 100px;
    }
    #old{
        position: absolute;
        right:170px;

    }


</style>
@section('contain')
    @include('includes.messageError')
    <div class="nav-wrapper">
        <form action="{{ route('requestsearch')}}" method="post">
            <div class="row">

                <div class="input-field col s4 ">
                    <label for="search"class="active">Search Customer First Name</label>
                    <input class="form-control " type="text" name="search" id="search" required>
                </div>

            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Search</button>
                <a id="old" href="{{route('oldRequest')}}" class="btn waves-effect waves-light" name="action">Old Requests </a>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token()}}">
        </form>
    </div>

    <div class="row">
        <div class="row">
            <div class="card-panel">
                <h2><span class="blue-text text-darken-2">{{$heading}}</span></h2>
            </div>
        </div>
        @if(sizeof($customers)==1)
            @for($i=0;$i<sizeof($requests);$i++)

                    <div class="row">
                        <div id="data">
                            <h5> Item : {{$requests[$i]->name}}  </h5>
                            Breif Discription : {{$requests[$i]->discribe}}<br>
                            Requested by: {{$customers[0]->first_name}} {{$customers[0]->last_name}}<br>
                            Quantity of Item request : {{$requests[$i]->quantity}}<br>
                            Due date : {{$requests[$i]->due}}<br><br>
                        </div>
                        <div id="button">
                            <div class="row">
                                <br><br>
                                <a id='complete' href="{{route('complete',['ID'=>$requests[$i]->id])}}" class="waves-effect waves-light btn">Complete</a>
                            </div>
                            <div class="row">
                                <a id='reject' href="{{route('reject',['ID'=>$requests[$i]->id])}}" class="waves-effect waves-light btn">Rejected</a>
                            </div>
                        </div>
                    </div>

            @endfor
        @else
            @for($i=0;$i<sizeof($requests);$i++)

                    <div class="row">
                        <div id="data">
                            <h5> Item : {{$requests[$i]->name}}  </h5>
                            Breif Discription : {{$requests[$i]->discribe}}<br>
                            Requested by: {{$customers[$i]->first_name}} {{$customers[$i]->last_name}}<br>
                            Quantity of Item request : {{$requests[$i]->quantity}}<br>
                            Due date : {{$requests[$i]->due}}<br><br>
                        </div>
                        <div id="button">
                            <div class="row">
                                <br><br>
                                <a id='complete' href="{{route('complete',['ID'=>$requests[$i]->id])}}" class="waves-effect waves-light btn">Complete</a>
                            </div>
                            <div class="row">
                                <a id='reject' href="{{route('reject',['ID'=>$requests[$i]->id])}}" class="waves-effect waves-light btn">Rejected</a>
                            </div>
                        </div>
                    </div>

            @endfor
        @endif

        <div class="row">
            <input type="hidden" name="_token" value="{{ Session::token()}}">
        </div>

    </div>


@endsection
