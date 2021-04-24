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
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">User Profile</a>
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
                <form method="post" id="formUser">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card card-secondary mb-4">
                                <div class="card-header">Log In Info</div>
                                <div class="card-body">
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Email </label>
                                        <input type="email" class="form-control" value=""
                                               name="email"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6 validate">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                   id="password">
                                        </div>
                                        <div class="form-group col-6 validate">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword">
                                        </div>
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Email Preference </label>
                                        <input type="text" class="form-control" value=""
                                               name="email_preference"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="email_preference">
                                            <option hidden selected disabled>Email Preference</option>
                                            <option value="1"
                                            >User
                                            </option>
                                            <option value="2"
                                            >Admin
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="role">
                                            <option hidden selected disabled>Role</option>
                                            <option value="1"
                                            >User
                                            </option>
                                            <option value="2"
                                            >Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary mb-4">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="form-group validate">


                                        <p>Is Smoking Allowed</p>
                                            <input type="radio" name="is_smoking_allowed"> Yes


                                            <input type="radio" name="is_smoking_allowed"> No
                                    </div>
                                    <div class="form-group validate">

                                        <p>Is Pet Allowed</p>


                                            <input type="radio" name="optradio"> Yes


                                            <input type="radio" name="optradio"> No


                                    </div>

                                    <select class="form-control" name="music_preference">
                                        <option hidden selected disabled>Music Preference</option>
                                        <option value="1"
                                        >1
                                        </option>
                                        <option value="2"
                                        >2
                                        </option>
                                    </select>
                                    <select class="form-control" name="chitchat_preference">
                                        <option hidden selected disabled>Chitchat Preference</option>
                                        <option value="1"
                                        >1
                                        </option>
                                        <option value="2"
                                        >2
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card card-secondary mb-4">
                                <div class="card-header">General Information</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6 validate">
                                            <label class="bmd-label-floating">First Name </label>
                                            <input type="text" class="form-control" value=""
                                                   name="firstName">
                                        </div>
                                        <div class="form-group col-6 validate">
                                            <label class="bmd-label-floating">Last Name </label>
                                            <input type="text" class="form-control" value=""
                                                   name="lastName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" validate">
                                            <input type="date" name="dob" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary mb-4">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Address </label>
                                        <input type="text" class="form-control" value=""
                                               name="Street"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="text" value="" class="form-control"
                                               name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary mb-4">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Driving License Number </label>
                                        <input type="text" class="form-control" value=""
                                               name="driving_license_number"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label style="font-size: 11px">Driving License Valid From </label>
                                        <input type="date" class="form-control" value=""
                                               name="driving_license_valid_from"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label style="font-size: 11px">Driving License Valid To </label>
                                        <input type="date" class="form-control" value=""
                                               name="driving_license_valid_to"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="identification_type">
                                            <option hidden selected disabled>Identification Type</option>
                                            <option value="1"
                                            >1
                                            </option>
                                            <option value="2"
                                            >2
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Identification Id </label>
                                        <input type="text" class="form-control" value=""
                                               name="identification_id"
                                               aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        <div class="modal fade" id="DeleteUser<%= dataUser.id %>" tabindex="-1"
                             role="dialog" aria-labelledby="deleteUser"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete
                                            <b><%= dataUser.firstName %> <%= dataUser.lastName %></b>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <a href="/admin/user/delete/<%= dataUser.id %>"
                                           class="btn btn-primary">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
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
<input type="hidden" value="user" id="page_active">
<script>
    var back_to_profile = document.querySelector('.back_to_profile')
    const imgurl = document.querySelector('input[name="avatar"]')
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
    back_to_profile.onclick = function () {
        window.location.href = location.protocol + "/profile";
    }
</script>
@include('layout.script')
<script>
    $(function () {
        $('#demoForm').validate({
            rules: {
                name: {
                    required: true,
                    maxLength: 255
                },
                password: {},
                email: {
                    required: true,
                    email: true,
                    maxLength: 255,
                },
            },
            messages: {
                name: {
                    required: 'Please enter your name',
                    maxlength: 'Name is limited to 255 characters',
                },
                password: {
                    required: 'Please enter your password',
                },
                email: {
                    required: 'Please enter sort order',
                    email: 'Please enter the correct email format',
                    maxLength: 'Sort order is limiter to 255 characters',
                },
            }
        })
    })
</script>
</body>

</html>
