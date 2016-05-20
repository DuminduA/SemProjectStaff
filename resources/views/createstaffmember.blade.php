@extends('layouts.master')

@section('title')
    Welcome To Orchid Bookshop!
    @endsection
    {{--{{Session::get('Pf_Id')}}--}}
    @section('contain')

        @if(count($errors) > 0)
            <div class="row">
                <div class="col-md-4 col-md-offset-4 error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @endif

                    <!--<div class="welcome">Welcome To Our Store!!</div>-->
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="row">
            <h3>Sign Up Form</h3>
            <h4 aria-busy="true">Your Profile/Username Id Is..   : {{$Pf_Id}}   </h4>
        </div>
        <form action="{{route('signupstaff')}}" method="post">
            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">perm_identity</i>--}}
                    <label for="first_name" class="active">First Name</label>
                    <input class="validate" type="text" name="first_name" id="first_name" onblur="this.value=this.value.toUpperCase()" required>
                </div>
                <div class="input-field col s6">
                    {{--<i class="material-icons">perm_identity</i>--}}
                    <label for="last_name" class="active">Last Name</label>
                    <input id="last_name" type="text" class="validate valid" name="last_name" onblur="this.value=this.value.toUpperCase()" required>

                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">email</i>--}}

                    <input id="email" name="email" type="email" class="validate " required >
                    <label for="email" class="active" data-error="Invalid Email" data-success="I Like it..">Email here</label>

                </div>
                <div class="input-field col s6">
                    {{--<i class="material-icons">phone</i>--}}

                    <input id="phone" name="phone" type="number" class="validate" length="10" maxlength="10" required >
                    <label for="phone" class="active" data-error="Invalid phone" data-success="I Like it..">Enter Your phone Number</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{--<i class="material-icons">mod_edit</i>--}}
                    <input id="password1" type="password" class="validate" name="password1" minlength="6" required><br>
                    <label for="password1" data-error="Length Should Be Greater than 6 characters" >Password</label>
                </div>
                <!-- confirm password-->
                <div class="input-field col s6">
                    {{--<i class="material-icons">mode_edit</i>--}}
                    <input id="password2" type="password" class="validate" name="password2">
                    <label for="password2">Confirm Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">

                    <input id="adress1" type="text" class="validate" name ='adress1' onblur="this.value=this.value.toUpperCase()" required>
                    <label for="adress1" >Adress1</label>
                </div>
                <div class="input-field col s6">
                    <input id="adress2" type="text" class="validate" name ='adress2' onblur="this.value=this.value.toUpperCase()" required>
                    <label for="adress2" >Adress2</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="adress3" type="text" class="validate" name ='adress3' onblur="this.value=this.value.toUpperCase()" required>
                    <label for="adress3" >Adress3</label>
                </div>
                <div class="input-field col s6">
                    <input id="adress4" type="text" class="validate" name ='adress4' onblur="this.value=this.value.toUpperCase()">
                    <label for="adress4" >Adress4</label>
                </div>
            </div>
            <div class="input-field col s6">
                <select class="browser-default" name="level" id="level" required>
                    <option value="1">Order Control</option>
                    <option value="2">Inventory Control</option>
                    <option value="3">Attendence Control</option>
                    <option value="4">Administrator</option>

                </select>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <script type="text/javascript">
                window.onload = function () {
                    document.getElementById("password1").onchange = validatePassword;
                    document.getElementById("password2").onchange = validatePassword;
                }
                function validatePassword(){
                    var pass2=document.getElementById("password2").value;
                    var pass1=document.getElementById("password1").value;
//                    document.getElementById('phone').onchange=validatePhone();

                    if(pass1!=pass2) {
                        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                    }
                    else
                        document.getElementById("password2").setCustomValidity('');
                }
//                function validatePhone() {
//                    var phone=document.getElementById('phone').value;
//                    if(phone.toString().length!=10){
//
//                        document.getElementById("phone").setCustomValidity("Enter A valid Phone Number");
//                    }
//                    else {
//                        document.getElementById("phone").setCustomValidity("");
//
//                    }
//                }
            </script>
            <button type="submit" class="btn waves-effect waves-light left submit " >Submit</button>

        </form>

    </div>
    <div class="error">

        {{Session::get('Error')}}
    </div>
@endsection

