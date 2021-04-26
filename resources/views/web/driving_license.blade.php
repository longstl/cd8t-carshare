<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('web/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{lib_assets('web/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Login - Layout 2 | Canvas</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">



    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="card nobottommargin" style="border: 1px solid rgba(0, 0, 0, 0.125);">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

                                        <h3 class="center">Login to your Account</h3>

                                        <div class="col_full">
                                            <label for="login-form-username">Number:</label>
                                            <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Driving License Valid From:</label>
                                            <input type="date" id="driving_license_valid_from" name="driving_license_valid_from" value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Driving License Valid To:</label>
                                            <input type="date" id="driving_license_valid_to" name="driving_license_valid_to" value="" class="form-control" />
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" style="margin-left: 35%!important;" id="login-form-submit" name="login-form-submit" value="login">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->



</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script src="{{lib_assets('web/js/jquery.js')}}"></script>
<script src="{{lib_assets('web/js/plugins.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{lib_assets('web/js/functions.js')}}"></script>

</body>
</html>
