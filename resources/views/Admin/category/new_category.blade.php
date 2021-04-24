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
    <style>
        ::placeholder {
            border: none;
            padding: 40px !important;
        }
    </style>
</head>

<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
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
                    <div class="col-md-7" style="margin: auto">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">New category</h3>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">

                                <form method="post" id="formCatagory">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $dataCategory ? $dataCategory->name : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Sort order</label>
                                                <input type="text" name="sort_number" class="form-control" value="{{ $dataCategory ? $dataCategory->sort_number : ''}}">
                                            </div>
                                        </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="text-muted">Avatar</div>
                                                    <div class="d-flex">
                                                        <input style="display: none" type="file" name="avatar_file"
                                                               id="myFileInput" >
                                                        <input type="hidden" name="image">
                                                        <div class="d-flex mr-3 pt-cr-img pt-wrap-plus border-success"
                                                             onclick="document.getElementById('myFileInput').click();">
                                                            <div class="pt-plus">+</div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <img id="image-preview" src="{{ $dataCategory ? $dataCategory->image : ''}}" class="img_show {{ $dataCategory ? '' : 'd-none'}}"
                                                                 style="width: 100px;height: 100px;border: #a9afbbd1 2px solid;border-radius:5px">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <a href="/test" class="btn btn-primary pull-right" >Back</a>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
<input type="hidden" value="category" id="page_active">
<!--   Core JS Files   -->
<script>
    var back_to_profile = document.querySelector('.back_to_profile')
    const imgurl = document.querySelector('input[name="image"]')
    const cloudName = 'ddmgbaegq';
    const unsignedUploadPreset = 'hrn13yyl';
    const img = document.querySelector('input[name="avatar_file"]');
    img.onchange = function () {
        var file = this.files[0];
        var url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    var dataJson = JSON.parse(this.responseText)
                    imgurl.value = dataJson.url

                    var img_review = document.getElementById('image-preview');
                    img_review.src = dataJson.url;
                    img_review.classList.remove('d-none');
                }
            }
        }
        xhr.open('POST', url, true);
        var ud = new FormData();
        ud.append('upload_preset', unsignedUploadPreset);
        ud.append('tags', 'browser_upload')
        ud.append('file', file)
        xhr.send(ud)
    }
    back_to_profile.onclick = function (){
        window.location.href = location.protocol+"/profile";
    }
</script>
@include('layout.script')

<script>
    $(function (){
        $('#formCatagory').validate({
            rules: {
                name: {
                    required: true,
                    maxLength: 255
                },
                sortOrder: {
                    required: true,
                    maxLength: 255,
                },
                icon: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please enter your name',
                    maxlength: 'Name is limited to 255 characters',
                },
                sortOrder: {
                    required: 'Please enter sort order',
                    maxLength: 'Sort order is limiter to 255 characters',
                },
                icon: {
                    required: 'Please choose the icon you like',
                },
            },
        });
    })
</script>
</body>

</html>
