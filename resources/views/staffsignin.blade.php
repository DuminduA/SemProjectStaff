
@extends('layouts.master')

@section('title')
    Sugn in Forum

@endsection

@section('contain')
    <div class="row">
        <div class="col-sm-6"></div>
        <h3>Sign Up Form</h3>
        <form action="{{route('staffsigninaction')}}" method="post">
            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">email</i>--}}

                    <input id="email" name="email" type="text" class="validate"  required >
                    <label for="username" class="active" data-error="Invalid Email" data-success="I Like it..">Username Here</label>
                </div>
                <!-- Enter Password-->
                <div class="input-field col s6">
                    {{--<i class="material-icons">mode_edit</i>--}}
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Confirm Password</label>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <button type="submit" class="btn waves-effect waves-light left submit " >Submit</button>
            {{--<div class="alert-success"></div>--}}
        </form>
    </div>

    <div class="alert-danger">
        {{Session::get('Error')}}
    </div>
    </div>



@endsection
