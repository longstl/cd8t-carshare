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
                    <a class="navbar-brand" href="javascript:void(0)">Sizes List</a>
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
                            @if(session()->get('status'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> {{ session()->get( 'user' ) }}
                                    {{ session()->get( 'status' ) }}
                                </div>
                            @endif
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="display: inline-block;margin-right: 30px">{{$title}}</h3>
                                <a href="/car/create" class="btn btn-warning">Create</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">

                                        <th>
                                            <h3>By</h3>
                                        </th>
                                        <th>
                                            <h3>Title</h3>
                                        </th>
                                        <th>
                                            <h3>Create At</h3>
                                        </th>

                                        <th>
                                            <h3>Action</h3>
                                        </th>
                                        </thead>
                                        <tbody>
                                        @foreach($list_feedback as $feedback)
                                            <div class="modal fade" id="Delete{{$feedback->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="deleteUser"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete
                                                                <b> Delete{{$feedback->user->name}} </b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <a href="{{route('deleteFeedback', $feedback->id)}}"
                                                               class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <tr>
                                                <td>
                                                    <h4>{{$feedback->user->name}}</h4>
                                                </td>
                                                <td>
                                                    <h4>{{$feedback->title}}</h4>
                                                </td>
                                                <td>
                                                    <h4>{{$feedback->create_at}}</h4>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$feedback->id}}">Delete</a>
                                                    <a ><button class="btn btn-success"></button>Reply</a>
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
        @include('layout.edit_style')
    </div>
</div>
<input type="hidden" value="size" id="page_active">
<!--   Core JS Files   -->
@include('layout.script')
</body>

</html>
