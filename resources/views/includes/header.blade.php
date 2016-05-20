<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{URL::to('/signup')}}">Create Staff Member</a></li>

</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="{{route('orderTable')}}">All Orders</a></li>
    <li><a href="{{route('newTable')}}">New Orders</a></li>
    <li><a href="{{route('proceedOrders')}}"> Proceed Orders</a></li>
    <li><a href="{{route('cancelOrders')}}"> Cancelled Orders</a></li>
    <li><a href="{{route('FinishOrders')}}"> Finished Orders</a></li>
    <li><a href="{{route('returnOrders')}}"> Return Orders</a></li>
</ul>

<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{route('newItem')}}">Add New Item</a></li>
            <li><a href="{{route('updateItems')}}">Inventory</a></li>
            <li><a class="dropdown-button" href="" data-activates="dropdown2">Orders Table<i class="material-icons right"></i></a></li>
            <li><a href="{{route('displayRequest')}}">Requests</a></li>
            <li><a href="{{route('markAttendance')}}">Mark Attendence</a></li>
            <li><a href="{{route('signout')}}">Signout</a></li>
            <li><a class="dropdown-button" href="" data-activates="dropdown1">Administrator<i class="material-icons right"></i></a></li>
        </ul>
    </div>
</nav>