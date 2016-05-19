<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">

            <li><a href="{{route('newOrders')}}">New Orders</a></li>
            <li><a href="{{URL::to('/signup')}}">Cancelled/Rejected</a></li>
            <li><a href="#">Mark Attendence</a></li>
            <li><a href="{{route('newItem')}}"></a></li>
            <li><a href="#">Requests</a></li>
            <li><a href="{{route('updateItems')}}">Processed</a></li>
            <li><a href="#">Administrator</a></li>

            <!-- Dropdown Trigger -->
            {{--<li><a class="dropdown-button" href="" data-activates="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>--}}
        </ul>
    </div>
</nav>