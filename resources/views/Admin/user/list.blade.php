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
    @include('layout.head');
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
                    <a class="navbar-brand" href="javascript:void(0)">Users List</a>
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

                            <div class="card-header card-header-primary card-container">
                                <h3 class="card-title ">Users</h3>
                                <form name="filterForm">
                                    <div class="form-group no-border">
                                        <input type="text" name="search" value="" placeholder="Search by keyword">
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                                <a href="/user/create">
                                    <button class="btn btn-success">
                                        Create new User
                                    </button>
                                </a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>User Name</h3>
                                        </th>
                                        <th>
                                            <h3>Full name</h3>
                                        </th>
                                        <th>
                                            <h3>Email</h3>
                                        </th>
                                        <th>
                                            <h3>Phone</h3>
                                        </th>

                                        <th>
                                            <h3>Address</h3>
                                        </th>
                                        </thead>
                                        <tbody>
                                        <tr></tr>

                                            <div class="modal fade" id="DeleteUse" tabindex="-1"
                                                 role="dialog" aria-labelledby="deleteUser"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete
                                                                <b>  </b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <a href="user/delete/"
                                                               class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    <img class="rounded-circle avatar" src="" alt="">
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser{{}}">Delete</a>
                                                    <a href="/user/update/"><button class="btn btn-success">Edit</button></a>
                                                </td>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content avatar_user" id="img01">
            <div id="caption"></div>
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
                <div class="row">


                </div>
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
            const limitInput = document.querySelector('select[name="limit"]');
            const formSearch = document.forms['filterForm'];
            const keywordInput = document.querySelector('input[name="search"]');
            keywordInput.onkeypress = function (event) {
                if (event.key == 'Enter') {
                    formSearch.submit();
                }
            }
            if (limitInput) {
                limitInput.onchange = function () {
                    formSearch.submit();
                }
            }

        </script>

    </div>
</div>
<div class="fixed-plugin">

    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            @include('layout.edit_style')
        </div>
    </div>

</div>
<input type="hidden" value="user" id="page_active">
<!--   Core JS Files   -->
@include('layout.script')

</body>

</html>
