<ul class="nav">
    <li class="nav-item " slot="">
        <a class="nav-link" href="">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('listUser')}}">
            <i class="material-icons">person</i>
            <p>Users Profile</p>
        </a>
    </li>
    <li class="nav-item " slot="user">
        <a class="nav-link" href="{{route('listRide')}}">
            <i class="fa fa-users" aria-hidden="true"></i>
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
        <a class="nav-link" href="{{route('listCar')}}">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <p>Models</p>
        </a>
    </li>

    <li class="nav-item" slot="color">
        <a class="nav-link" href="{{route('listFeedback')}}">
            <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            <p>Feedbacks</p>
        </a>
    </li>
    <li class="nav-item" slot="product">
        <a class="nav-link" href="/product">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <p>Products</p>
        </a>
    </li>

{{--    <li class="nav-item" slot="request">--}}
{{--        <a class="nav-link" href="">--}}
{{--            <i class="fa fa-server" aria-hidden="true"></i>--}}
{{--            <p>Products Options</p>--}}
{{--        </a>--}}
{{--    </li>--}}
    <li class="nav-item " slot="order">
        <a class="nav-link" href="/order">
            <i class="fa fa-first-order" aria-hidden="true"></i>
            <p>Orders</p>
        </a>
    </li>
{{--    <li class="nav-item " slot="order_detail">--}}
{{--        <a class="nav-link" href="">--}}
{{--            <i class="fa fa-info" aria-hidden="true"></i>--}}
{{--            <p>Order Detail</p>--}}
{{--        </a>--}}
{{--    </li>--}}
</ul>
