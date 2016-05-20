@extends('layouts.master')

@section('title')
    Password Reset
@endsection


@section('contain')
    <h3>Fill out following fileds to reset password</h3>

    <form action="{{route('passwordReset')}}" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input id="email" name="email" type="email" class="validate" required>
                <label for="email" class="active" data-error="Invalid Email" data-success="I Like it..">Your Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="password" name="password" type="password" class="validate" minlength="6" required>
                <label for="password">Enter Old Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="passwordNew1" name="passwordNew1" type="password" class="validate" minlength="6" required>
                <label for="passwordNew1">Enter New Password</label>
            </div>
        </div>    <div class="row">
            <div class="input-field col s6">
                <input id="passwordNew2" name="passwordNew2" type="password" class="validate" minlength="6" required>
                <label for="passwordNew2">Confim New Password</label>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <button type="submit" class="btn waves-effect waves-light left submit " >Submit</button>
        <script type="text/javascript">
            window.onload = function () {
                document.getElementById("passwordNew1").onchange = validatePassword;
                document.getElementById("passwordNew2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("passwordNew2").value;
                var pass1=document.getElementById("passwordNew1").value;
                if(pass1!=pass2) {
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                }
                else
                    document.getElementById("password2").setCustomValidity('');
            }
        </script>
    </form>
    <div class="error">

        <h1> {{Session::get('Error')}}</h1>
    </div>

@endsection