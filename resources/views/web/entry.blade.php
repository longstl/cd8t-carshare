<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    <!-- Stylesheets
    ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
        rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css/dark.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css/font-icons.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css//animate.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{lib_assets('css/magnific-popup.css')}}/" type="text/css"/>

    <link rel="stylesheet" href="{{lib_assets('css/responsive.css')}}" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Document Title
    ============================================= -->
    <title>Login - Layout 2 | Canvas</title>

    <style>
        label.error {
            display: inline-block !important;
        }
    </style>
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_one_third nobottommargin">

                <div class="well well-lg nobottommargin">
                    <form id="login-form" name="login-form" class="nobottommargin" action="{{route('loginUser')}}"
                          method="post">
                        @csrf
                        <h3>Login to your Account</h3>

                        <div class="col_full">
                            <label for="login-form-username">Username:</label>
                            <input type="text" id="login-form-username" name="username" value=""
                                   class="form-control"/>
                        </div>

                        <div class="col_full">
                            <label for="login-form-password">Password:</label>
                            <input type="password" id="login-form-password" name="password" value=""
                                   class="form-control"/>
                        </div>

                        <div class="col_full">
                            <button class="button button-3d nomargin" id="login-form-submit" value="login">Login
                            </button>
                            <a href="#" class="fright">Forgot Password?</a>
                        </div>

                    </form>
                </div>

            </div>

            <div class="col_two_third col_last nobottommargin">


                <h3>Don't have an Account? Register Now.</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint
                    ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus
                    ratione.</p>

                <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

                    <div class="col_half">
                        <label class="form-group">Name:</label>
                        <input type="text" name="register-form-name" value="" class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label class="form-group">Email:</label>
                        <input type="text" name="register-form-email" value="" class="form-control" />
                    </div>

                    <div class="col_half">
                        <label class="form-group">Password:</label>
                        <input type="text" name="register-form-name" value="" class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label class="form-group">Comfirm Password:</label>
                        <input type="text" name="register-form-name" value="" class="form-control"/>
                    </div>

                    <div class="col_half">
                        <label class="form-group">First Name:</label>
                        <input type="text" name="register-form-name" value="" class="form-control" />
                    </div>
                    <label class="form-group">Email:</label>
                    <input type="text" name="register-form-email" value="" class="form-control"/>
                </form>
            </div>

            <div class="clear"></div>

            <div class="col_half">
                <label class="form-group">Phone:</label>
                <input type="text" name="register-form-name" value="" class="form-control" />
            </div>

            <div class="col_half col_last">
                <label class="form-group">DRIVING LICENSE NUMBER:</label>
                <input type="text" name="register-form-name" value="" class="form-control" />
            </div>

            <div class="col-ml-4">
                <label for="register-form-password">MUSIC PREFORMENT</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="" hidden selected disabled></option>
                    <option>Calm</option>
                    <option>None</option>
                    <option>Loud</option>
                </select>
            </div>

            <div class="col-ml-4">
                <label for="register-form-repassword">CHITCHAT PREFORMENT</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="" hidden selected disabled></option>
                    <option>Calm</option>
                    <option>None</option>
                    <option>Loud</option>
                </select>
            </div>
            <div class="clear"></div>

            <div class="col_half">
                <label class="form-group">First Name:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half col_last">
                <label class="form-group">Last Name:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half">
                <label class="form-group">ADDRESS:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half col_last">
                <label class="form-group">Phone:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half">
                <label class="form-group">DRIVING LICENSE NUMBER:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half">
                <label class="form-group">DRIVING LICENSE VALID FROM:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half col_last">
                <label class="form-group">TEXTIDENTIFICATION ID:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>

            <div class="col_half">
                <label class="form-group">IDENTIFENCATION VALID FROM:</label>
                <input type="text" name="register-form-name" value="" class="form-control"/>
            </div>


            <div class="col_half">
                <h4>IS SMOKING ALLOWED</h4>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios"
                               id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios"
                               id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">No</label>
                    </div>
                </form>
            </div>

            <div class="col_half col_last">
                <h4>IS PET ALLOWED</h4>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios"
                               id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios"
                               id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">No</label>
                    </div>
                </form>
            </div>

            <div class="clear"></div>

            <div class="col_full nobottommargin">
                <button class="button button-3d button-black nomargin" id="register-form-submit"
                        name="register-form-submit" value="register">Register Now
                </button>
            </div>


        </div>

    </div>


</section><!-- #content end -->
<!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script src="{{lib_assets('js/jquery.js')}}"></script>
<script src="{{lib_assets('js/plugins.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{lib_assets('js/functions.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


<!--<script>-->
<!--    $(function () {-->
<!--        $('#login-form').validate({-->
<!--            rules: {-->
<!--                loginFormUsername: {-->
<!--                    required: true,-->
<!--                },-->
<!--                loginFormPassword: {-->
<!--                    required: true,-->
<!--                },-->
<!--            },-->
<!--            message: {-->
<!--                loginFormUsername: {-->
<!--                    required: 'Please enter user name'-->
<!--                },-->
<!--                loginFormPassword: {-->
<!--                    required: 'Please enter your password'-->
<!--                }-->
<!--            }-->
<!--        })-->
<!--    })-->
<!--</script>-->

{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#register-form').validate({--}}
{{--            rules: {--}}
{{--                1: {--}}
{{--                    required: true,--}}
{{--                    maxLength: 255,--}}
{{--                },--}}
{{--                2: {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                3: {--}}
{{--                    required: true,--}}
{{--                    equalTo: '#password'--}}
{{--                },--}}
{{--                4: {--}}
{{--                    required: true,--}}
{{--                    maxlength: 255,--}}
{{--                    email: true--}}
{{--                },--}}
{{--                5: {--}}
{{--                    required: true,--}}
{{--                    maxLength: 255,--}}
{{--                },--}}
{{--                6: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                7: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                8: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                9: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                10: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                11: {--}}
{{--                    required: true,--}}
{{--                    maxlength: 255,--}}
{{--                },--}}
{{--                12: {--}}
{{--                    required: true,--}}
{{--                    maxlength: 255,--}}
{{--                },--}}
{{--                13: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                14: {--}}
{{--                    required: true,--}}
{{--                    maxlength: 10,--}}
{{--                    minlength: 5--}}
{{--                },--}}
{{--                15: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                16: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                17: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                18: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                19: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--            },--}}
{{--            message: {--}}
{{--                1: {--}}
{{--                    required: 'Please enter your a name',--}}
{{--                    maxLength: 'Please enter enough characters 255',--}}
{{--                },--}}
{{--                2: {--}}
{{--                    required: 'Please enter your a password',--}}
{{--                },--}}
{{--                3: {--}}
{{--                    required: 'Please re-enter your password',--}}
{{--                    equalTo: '#password'--}}
{{--                },--}}
{{--                4: {--}}
{{--                    required: 'Please enter email',--}}
{{--                    maxlength: 'Email name is limited to 255 characters',--}}
{{--                    email: 'Please enter true email'--}}
{{--                },--}}
{{--                5: {--}}
{{--                    required: 'Please enter a email performance',--}}
{{--                    maxLength: 'Email name is limited to 255 characters',--}}
{{--                },--}}
{{--                6: {--}}
{{--                    required: 'Please enter a is smoking allowed',--}}
{{--                },--}}
{{--                7: {--}}
{{--                    required: 'Please enter a is pet allowed',--}}
{{--                },--}}
{{--                8: {--}}
{{--                    required: 'Please enter music perdormance',--}}
{{--                },--}}
{{--                9: {--}}
{{--                    required: 'Please enter chit chat performance',--}}
{{--                },--}}
{{--                10: {--}}
{{--                    required: 'Please enter citizen identification',--}}
{{--                },--}}
{{--                11: {--}}
{{--                    required: 'Please enter a first name',--}}
{{--                    maxlength: 'First name is limited to 100 characters'--}}
{{--                },--}}
{{--                12: {--}}
{{--                    required: 'Please enter a last name',--}}
{{--                    maxlength: 'Lirst name is limited to 100 characters'--}}
{{--                },--}}
{{--                13: {--}}
{{--                    required: 'Please enter address',--}}
{{--                },--}}
{{--                14: {--}}
{{--                    required: 'Please enter a number phone',--}}
{{--                    maxlength: 'Phone name is limited to 10 characters',--}}
{{--                    minlength: 'Phone minimum 5 characters'--}}
{{--                },--}}
{{--                15: {--}}
{{--                    required: 'Please enter number',--}}
{{--                },--}}
{{--                16: {--}}
{{--                    required: 'Please enter valid form ',--}}
{{--                },--}}
{{--                17: {--}}
{{--                    required: 'Please enter text Identification Id',--}}
{{--                },--}}
{{--                18: {--}}
{{--                    required: 'Please enter identification',--}}
{{--                },--}}
{{--                19: {--}}
{{--                    required: 'Please enter identification valid from',--}}
{{--                },--}}
{{--            },--}}
{{--            errorClass: 'errorMsg',--}}
{{--            errorPlacement: function (error, element) {--}}
{{--                error.appendTo(element.parents('.validate'));--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

</body>
</html>
