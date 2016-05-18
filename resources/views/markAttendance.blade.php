@extends('layouts.master')

@section('contain')

    <form  action='{{route('markAttendance')}}' method = "post">
    <br/><br/>
    <div>
    <label>Select Staff Member</label>

    <select class="browser-default" name="sid" required>
        <option value="" disabled selected></option>
        <?php $counter=0; ?>
        @foreach($m_Staff as $s)
        <?php $counter++; ?>
        <option name="counter" value="{{$s->id}}">{{$s->first_name }} {{$s->last_name}}</option>
        @endforeach
    </select>


    <br/><br/>

        <div>
            <label>mark attendance</label>
            <select class="browser-default" name="attendance" required>
                <option value="" disabled selected></option>
                <option value="1">present</option>
                <option value="2">absent</option>
            </select>
            </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="hh:mm:ss" name="arrivalTime" type="text" class="datepicker">
            <label for="first_name">Arrival Time</label>
        </div>
    </div>
        <br/><br/>
        <div id="but2">
        <button  class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    <form method="link" action="http://localhost/SemProjectStaff/public/attendance">
        <div id="but1">
            <button class="btn waves-effect waves-light" type="submit" name="action">View Attendance
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

@endsection