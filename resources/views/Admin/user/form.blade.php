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
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong> {{ implode('', $errors->all(':message')) }}</strong>
                    </div>
                @endif
                <form method="post" id="formUser" action="{{route('storeUser')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card card-secondary mb-4">
                                <div class="card-header">Log In Info</div>
                                <div class="card-body">
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->username : ''}}"
                                               name="username"
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
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control" value="{{ $data_user ? $data_user->email : ''}}"
                                               name="email"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="email_preference">
                                            <option hidden selected disabled>Email Preference</option>
                                            <option value="0" {{$data_user && $data_user->email_preference === 0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$data_user && $data_user->email_preference === 1 ? 'selected' : ''}}>Only ride</option>
                                            <option value="2" {{$data_user && $data_user->email_preference === 2 ? 'selected' : ''}}>All</option>
                                        </select>
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="role">
                                            <option hidden selected disabled>Role</option>
                                            <option value="1" {{$data_user && $data_user->role === 1 ? 'selected' : ''}}>User</option>
                                            <option value="2" {{$data_user && $data_user->role === 2 ? 'selected' : ''}}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary mb-4">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="form-group validate">


                                        <p>Is Smoking Allowed</p>
                                        <input type="radio" name="is_smoking_allowed" value="1" {{$data_user && $data_user->is_smoking_allowed === 1 ? 'checked' : ''}}> Yes


                                        <input type="radio" name="is_smoking_allowed" value="0" {{$data_user && $data_user->is_smoking_allowed === 0 ? 'checked' : ''}}> No
                                    </div>
                                    <div class="form-group validate">

                                        <p>Is Pet Allowed</p>


                                        <input type="radio" name="is_pet_allowed" value="1" {{$data_user && $data_user->is_pet_allowed === 1 ? 'checked' : ''}}> Yes


                                        <input type="radio" name="is_pet_allowed" value="0" {{$data_user && $data_user->is_pet_allowed === 0 ? 'checked' : ''}}> No


                                    </div>

                                    <select class="form-control" name="music_preference">
                                        <option hidden selected disabled>Music Preference</option>
                                        <option value="0">None</option>
                                        <option value="1">Calm</option>
                                        <option value="2">Loud</option>
                                    </select>
                                    <select class="form-control" name="chitchat_preference">
                                        <option hidden selected disabled>Chitchat Preference</option>
                                        <option value="0" {{$data_user && $data_user->chitchat_preference === 0 ? 'selected' : ''}}>None</option>
                                        <option value="1" {{$data_user && $data_user->chitchat_preference === 1 ? 'selected' : ''}}>Little</option>
                                        <option value="2" {{$data_user && $data_user->chitchat_preference === 2 ? 'selected' : ''}}>Lot</option>
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
                                            <input type="text" class="form-control" value="{{ $data_user ? $data_user->first_name : ''}}"
                                                   name="first_name">
                                        </div>
                                        <div class="form-group col-6 validate">
                                            <label class="bmd-label-floating">Last Name </label>
                                            <input type="text" class="form-control" value="{{ $data_user ? $data_user->last_name : ''}}"
                                                   name="last_name">
                                        </div>
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Address </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->address : ''}}"
                                               name="address"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="text" value="{{ $data_user ? $data_user->phone : ''}}" class="form-control"
                                               name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary mb-4">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Driving License Number </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->driving_license_number : ''}}"
                                               name="driving_license_number"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Driving License Valid From </label>
                                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->driving_license_valid_from : ''}}"
                                               name="driving_license_valid_from"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Driving License Valid To </label>
                                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->driving_license_valid_to : ''}}"
                                               name="driving_license_valid_to"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">

                                        <select class="form-control" name="identification_type">
                                            <option hidden disabled>Identification Type</option>
                                            <option value="1" {{$data_user && $data_user->identification_type === 1 ? 'selected' : ''}}>Citizen Identification</option>
                                            <option value="2" {{$data_user && $data_user->identification_type === 2 ? 'selected' : ''}}>Pass Port</option>
                                        </select>
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Identification Id </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->identification_id : ''}}"
                                               name="identification_id"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Identification Valid From </label>
                                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_from : ''}}"
                                               name="identification_valid_from"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group validate">
                                        <label class="bmd-label-floating">Identification Valid To </label>
                                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_to : ''}}"
                                               name="identification_valid_to"
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
        </script>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('layout.edit_style')
    </div>
</div>
<input type="hidden" value="user" id="page_active">
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
