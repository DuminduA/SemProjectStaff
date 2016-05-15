@extends('layouts.master')

@section('contain')

    @if($errors)
        <ul>
           @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <?php $staff_id; ?>

    <form method = "post">
    <br/><br/>
    <div>
    <label>Select Staff Member</label>
    <select class="browser-default" name="name" >
        <option value="" disabled selected></option>
        <?php $counter=0; ?>
        @foreach($mStaff as $s)
        <?php $counter++; ?>
        <option value="$counter">{{$s->first_name }} {{$s->last_name}}</option>
            <?php $staff_id=$counter; ?>
        @endforeach
    </select>


    <br/><br/>
        <div>
            <label>mark attendance</label>
            <select class="browser-default" name="attendance" >
                <option value="" disabled selected></option>
                <option value="1">present</option>
                <option value="2">absent</option>
            </select>
            </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="hh:mm:ss" name="arrivalTime" type="text" class="validate">
            <label for="first_name">Arrival Time</label>
        </div>
    </div>
        <br/><br/>
        <div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
@endsection