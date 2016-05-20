
@extends('layouts.startPage')

@section('title')
    Sign in Forum

@endsection

@section('contain')

        <div class="col-sm-6"></div>
        <h3>Sign In Form</h3>
        <form action="{{route('staffsigninaction')}}" method="post">
            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">email</i>--}}

                    <input id="username" name="username" type="text" class="validate"  required >
                    <label for="username" class="active" data-error="Invalid Email" data-success="I Like it..">Username Here</label>
                </div>
            </div>
                <!-- Enter Password-->
            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">mode_edit</i>--}}
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password" class="active">Confirm Password</label>
                </div>
            </div>

            <input type="hidden" name="_token" value="{{Session::token()}}">
            <div class="row">
            <button type="submit" class="btn waves-effect waves-light left submit " >Submit</button>
            {{--<div class="alert-success"></div>--}}
            </div>
            <div class="row">

            </div>
            <div class="row">

            </div>

        </form>


    <div class="error">
        <div class="alert-danger">
            {{Session::get('Error')}}
        </div>
    </div>


@endsection
