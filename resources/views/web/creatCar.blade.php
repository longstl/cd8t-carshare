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
    <title>Login - Layout 5 | Canvas</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background-size: cover;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container-fluid vertical-middle divcenter clearfix">


                    <div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93)">
                        <div class="card-body" style="padding: 40px;">
                            <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                                <h3 class="center">Creat Car</h3>

                                <div class="col_full">
                                    <label for="login-form-username">Number:</label>
                                    <select name="login-form-username" id="login-form-username">
                                        @foreach($listModel as $model)
                                            <option hidden selected disabled>Model</option>
                                            <option value="{{$model->id}}">{{$model->make.' '.$model->model}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password">Car Registration Number</label>
                                    <input type="text" id="car_registration_number" name="car_registration_number" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password">Color</label>
                                    <input type="text" id="color" name="color" value="" class="form-control not-dark" />
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
