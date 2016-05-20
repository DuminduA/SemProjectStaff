<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{route('signupForm')}}">Create Staff Account</a></li>
    <li class="divider"></li>
    <li><a href="#!"> Profit Report</a></li>
    <li class="divider"></li>
    <li><a href="#!">Drop Staff</a></li>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">

            <li><a href="{{route('signout')}}">Signout</a></li>
            {{--<li><a href="{{URL::to('/signup')}}">Create Staff Member</a></li>--}}
            <li><a href="{{route('markAttendance')}}">Mark Attendence</a></li>
            <li><a href="{{route('newItem')}}">Add New Item</a></li>
            <li><a href="{{route('displayRequest')}}">Requests</a></li>
            <li><a href="{{route('updateItems')}}">Inventory</a></li>

            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="" data-activates="dropdown1">Admin<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>