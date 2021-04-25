<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.layout.head')
</head>
<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a></div>
        <div class="sidebar-wrapper">
            @include('admin.layout.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Table size</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="margin-right: 30px;display: inline-block">Options</h3>
                                <form action="#" style="display: inline-block">
                                    <div class="form-group no-border">
                                        <input type="text" placeholder="Search by keyword" style="background: none;border: none;color: #9c9b9b">
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>Order by</h3>
                                        </th>
                                        <th>
                                            <h3>Pick Up Address</h3>
                                        </th>
                                        <th>
                                            <h3>Destination Address</h3>
                                        </th>
                                        <th>
                                            <h3>Time</h3>
                                        </th>
                                        <th>
                                            <h3>Seats Occupy</h3>
                                        </th>



                                        <th>
                                            <h3>Price</h3>
                                        </th>
                                        <th>
                                            <h3>Status</h3>
                                        </th>
                                        <th>
                                            <h3>Action</h3>
                                        </th>

                                        </thead>
                                        @foreach($list_request as $request)
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h4>{{$request->user->first_name}} {{$request->user->last_name}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$request->pickup_address}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$request->destination_address}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{date('H:i', strtotime($request->desired_pickup_time))}}
                                                   </h4>
                                            </td>

                                            <td>
                                                <h4>{{$request->seats_occupy}}</h4>
                                            </td>
                                            <td>

                                                <h4>{{$request->price}}
                                                    </h4>
                                            </td>
                                            <td>
                                                <h4>{{\App\Enums\RideRequestStatus::getDescription($request->status)}}</h4>
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right" id="date">
                    , made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('admin.layout.edit_style')
    </div>
</div>
<input type="hidden" value="option" id="page_active">
@include('admin.layout.script')
</body>
</html>
