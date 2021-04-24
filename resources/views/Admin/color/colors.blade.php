<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a></div>
        <div class="sidebar-wrapper">
            @include('layout.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Colors List</a>
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
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="display: inline-block;margin-right: 30px">Colors</h3>
                                <a href="/color/create" class="btn btn-success" >Create new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>Color ID</h3>
                                        </th>
                                        <th>
                                            <h3>Name</h3>
                                        </th>
                                        <th>
                                            <h3>Color Code</h3>
                                        </th>
                                        <th>
                                            <h3>Show color</h3>
                                        </th>
                                        <th>
                                            <h3>Sort Number</h3>
                                        </th>
                                        <th>
                                            <h3>Action</h3>
                                        </th>

                                        </thead>
                                        <tbody>

                                        <tr>
                                            @foreach($listColor as $getColor)
                                                <div class="modal fade" id="DeleteColor{{ $getColor->id}}" tabindex="-1"
                                                     role="dialog" aria-labelledby="deleteUser"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete
                                                                    <b> {{ $getColor->name }} </b>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                        data-dismiss="modal">Cancel
                                                                </button>
                                                                <a href="color/delete/{{ $getColor->id }}"
                                                                   class="btn btn-primary">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <td>
                                                <h4>{{$getColor->id}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$getColor->name}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$getColor->code}}</h4>
                                            </td>
                                            <td>
                                                <div class="show_color" style="background: {{$getColor->code}}"></div>
                                            </td>
                                            <td>
                                                <h4>{{$getColor->sort_number}}</h4>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteColor{{ $getColor->id }}">Delete</a>
                                                <a href="/color/update/{{$getColor->id}}"><button class="btn btn-success">Edit</button></a>
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
        <script>
            const x = new Date().getFullYear();
            let date = document.getElementById('date');
            date.innerHTML = '&copy; ' + x + date.innerHTML;
        </script>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('layout.edit_style')
    </div>
</div>
    <input type="hidden" value="color" id="page_active">
<!--   Core JS Files   -->
@include('layout.script')
</body>

</html>
