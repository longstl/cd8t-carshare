<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.he ad')
    <style>
        ::placeholder {
            border: none;
        }
    </style>
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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Table List</a>
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
                    <div class="col-md-6" style="margin: auto">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">New color</h3>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="formColors" class="col-md-8" style="margin: auto">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $dataColor ? $dataColor->name : ''}}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Sort Number</label>
                                                <input type="text" name="sort_number" class="form-control" value="{{ $dataColor ? $dataColor->sort_number : ''}}"required/>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control col-md-6" placeholder="Color"
                                                      value="{{ $dataColor ? $dataColor->code : ''}}" id="color" name="code">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <input type="color" id="html5colorpicker"
                                                           onblur="document.querySelector('#color').value = this.value" required/>
                                                           style="width: 30px; height: 30px;">
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="" class="btn btn-primary pull-right mt-5">Back</a>
                                    <button type="submit" class="btn btn-primary pull-right mt-5">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
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
                <div class="copyright" id="date">
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
        @include('admin.layout.edit_style')
    </div>
</div>
<input type="hidden" value="color" id="page_active">
<!--   Core JS Files   -->
@include('admin.layout.script')


<script>
    $(function () {
        $('#formColors').validate({
            rules: {
                name: {
                    required: true,
                    maxLength: 255
                },
                code: {
                    required: true,
                },
                sortOrder: {
                    required: true,
                    maxLength: 255,
                },
            },
            messages: {
                name: {
                    required: 'Please enter your name',
                    maxlength: 'Name is limited to 255 characters',

                },
                code: {
                    required: 'Please choose the color you like',

                },
                sortOrder: {
                    required: 'Please enter sort order',
                    maxLength: 'Sort order is limiter to 255 characters',

                }
            }
        });
    })
</script>
</body>

</html>
