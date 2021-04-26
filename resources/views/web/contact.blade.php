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
    <title>Contact - Layout 2 with reCaptcha | Canvas</title>

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

                <!-- Contact Form
                ============================================= -->
                <div class="col_half">

                    <div class="fancy-title title-dotted-border">
                        <h3>Send us an Email</h3>
                    </div>

                    <div class="contact-widget">

                        <div class="contact-form-result"></div>

                        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                            <div class="form-process"></div>

                            <div class="col_full">
                                <label for="template-contactform-name">Title<small>*</small></label>
                                <input type="text" id="template-contactform-title" name="template-contactform-title" value="" class="sm-form-control required" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-content">Content<small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
                            </div>

                        </form>
                    </div>

                </div><!-- Contact Form End -->

                <!-- Google Map
                ============================================= -->
                <div class="col_half col_last">

                    <section id="google-map" class="gmap" style="height: 410px;"></section>

                </div><!-- Google Map End -->

                <div class="clear"></div>

                <!-- Contact Info
                ============================================= -->
                <div class="row clear-bottommargin">

                    <div class="col-lg-3 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-map-marker2"></i></a>
                            </div>
                            <h3>Our Headquarters<span class="subtitle">Melbourne, Australia</span></h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-phone3"></i></a>
                            </div>
                            <h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-skype2"></i></a>
                            </div>
                            <h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-twitter2"></i></a>
                            </div>
                            <h3>Follow on Twitter<span class="subtitle">2.3M Followers</span></h3>
                        </div>
                    </div>

                </div><!-- Contact Info End -->

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

<script src="https://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="{{lib_assets('web/js/jquery.gmap.js')}}"></script>

<script>
    jQuery('#google-map').gMap({
        address: 'Melbourne, Australia',
        maptype: 'ROADMAP',
        zoom: 14,
        markers: [
            {
                address: "Melbourne, Australia",
                html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
                icon: {
                    image: "images/icons/map-icon-red.png",
                    iconsize: [32, 39],
                    iconanchor: [32,39]
                }
            }
        ],
        doubleclickzoom: false,
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }
    });
</script>

</body>
</html>
