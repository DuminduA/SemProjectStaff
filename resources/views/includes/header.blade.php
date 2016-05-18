<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">

            <li><a href="{{route('signout')}}">Signout</a></li>
            <li><a href="{{URL::to('/signup')}}">Create Staff Member</a></li>
            <li><a href="#">Mark Attendence</a></li>
            <li><a href="{{route('newItem')}}">Add New Item</a></li>
            <li><a href="{{route('displayRequest')}}">Requests</a></li>
            <li><a href="{{route('updateItems')}}">Inventory</a></li>
            <li><a href="#">Administrator</a></li>

            <!-- Dropdown Trigger -->
            {{--<li><a class="dropdown-button" href="" data-activates="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>--}}
        </ul>
    </div>
</nav>