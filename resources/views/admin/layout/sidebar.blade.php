<ul class="nav">
    <li class="nav-item " slot="">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('listUser')}}">
            <i class="material-icons">person</i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-item " slot="user">
        <a class="nav-link" href="{{route('listRide')}}">
            <i class="fa fa-car" aria-hidden="true"></i>
            <p>Rides</p>
        </a>
    </li>
    <li class="nav-item " slot="category">
        <a class="nav-link" href="{{route('listRequest')}}">
            <i class="fa fa-list" aria-hidden="true"></i>
            <p>Requests</p>
        </a>
    </li>
    <li class="nav-item" slot="car">
        <a class="nav-link" href="{{route('listModel')}}">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <p>Car models</p>
        </a>
    </li>

    <li class="nav-item" slot="color">
        <a class="nav-link" href="{{route('listFeedback')}}">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <p>Feedback</p>
        </a>
    </li>

    <li class="nav-item" slot="color">
        <a class="nav-link" href="{{route('show_approve_drivers')}}">
            <i class="fa fa-check" aria-hidden="true"></i>
            <p>Approve drivers</p>
        </a>
    </li>
    <li class="nav-item" slot="color">
        <a class="nav-link" href="{{route('formNotification')}}">
            <i class="fa fa-bell" aria-hidden="true"></i>
            <p>Notifications</p>
        </a>
    </li>
</ul>
