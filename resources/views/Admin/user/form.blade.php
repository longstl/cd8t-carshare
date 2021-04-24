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
                <div class="row">
                    <div class="col-md-8" style="margin: auto">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">New admin</h4>
                                <p class="card-category">Complete your profile</p>
                            </div>
                            <div class="card-body">

                                    <a href="" class="pull-right btn btn-primary">Back</a>
                                    <button type="submit" class="back_to_profile btn btn-primary pull-right">Submit</button>
                                </form>
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
    back_to_profile.onclick = function (){
        window.location.href = location.protocol+"/profile";
    }
</script>
@include('layout.script')
<script>
    $(function (){
        $('#demoForm').validate({
            rules: {
                name: {
                    required: true,
                    maxLength: 255
                },
                password: {

                },
                email: {
                    required: true,
                    email:true,
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
                    email:'Please enter the correct email format',
                    maxLength: 'Sort order is limiter to 255 characters',
                },
            }
        })
    })
</script>
</body>

</html>
