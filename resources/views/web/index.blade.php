<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    @include('web.layout.Style')
    <title>Home | Car Share</title>
</head>
<body class="stretched">
<div id="wrapper" class="clearfix">
@include('web.layout.header')
    <section id="slider" class="slider-element "
             style="background: url('{{url('https://storage.googleapis.com/f1-cms/2019/10/fc32bc4b-20191014_022042.jpg')}}') no-repeat; background-size: cover;padding-top: 200px;height: 400px!important;"
             data-height-xl="600" data-height-lg="500" data-height-md="400" data-height-sm="300" data-height-xs="250">
        <div class="slider-parallax-inner">

            <div class="container clearfix">
                <div class="vertical-middle dark center">

                    <div class="heading-block nobottommargin center">
                        <h1 class="txt_baner">
                            <span class="text-rotater nocolor" data-separator="|" data-rotate="flipInX"
                                  data-speed="3500">
									LOOKING FOR A RIDE ?</span>
                        </h1>
                        <span class="d-md-block txt_baner">FIND PEOPLE TRAVELLING  TO YOUR DESTINATION</span>
                        <a href="#"
                           class="btn btn-outline-dark button button-border  button-rounded tright button-large topmargin d-none d-md-inline-block"><span
                                style="color: #0b0b0b">Find a Ride</span></a>
                        <a href="#"
                           class="btn btn-outline-dark button button-border  button-rounded tright button-large topmargin d-none d-md-inline-block"><span
                                style="color: #0b0b0b">Book Now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content1">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="col_one_third">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-screen i-alt"></i></a>
                        </div>
                        <h3>FIND</h3>
                        <p>Find People who share similar journey and match criteria</p>
                    </div>
                </div>
                <div class="col_one_third">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-eye i-alt"></i></a>
                        </div>
                        <h3>BOOK</h3>
                        <p>Book your ride online in few clicks</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-beaker i-alt"></i></a>
                        </div>
                        <h3>THAT"S ALL</h3>
                        <p>Connect people & make new friends</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="slider2" class=" swiper_wrapper">
        <div class="col-md-10" style="position: absolute;right: 0">
            <div class="col_one_third bottommargin-sm center ml-5">
                <img data-animate="fadeInLeft" src="https://mailinh.vn/uploads/media/1/images/dich-vu/1.png">
            </div>
            <div class="col_two_third bottommargin-sm col_last abc">
                <p class="text-P" style="margin-bottom: 10px !important;font-size: 250%; margin-top: 2%;">TRAVELLING</p>
                <p class="text-P" style="margin-bottom: 10px !important;font-size: 300%"><b>ALONE</b></p>
                <p class="text-P">Offer ride and earn money enjoy the preedom of income with mo efforts with the help of
                    this incredible website.</p>
                <a href="#"
                   class="button button-border button-dark button-rounded button-large noleftmargin topmargin-sm mt-5 text-P">READ
                    MORE</a>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-screen i-alt"></i></a>
                            </div>
                            <h3>Responsive Layout</h3>
                            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size.
                                Resize browser to view.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-eye i-alt"></i></a>
                            </div>
                            <h3>Retina Ready Graphics</h3>
                            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp;
                                all others graphics are optimized.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-beaker i-alt"></i></a>
                            </div>
                            <h3>Powerful Performance</h3>
                            <p>Canvas includes tons of optimized code that are completely customizable and deliver
                                unmatched fast performance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.layout.footer')
</div>
    <i id="gotoTop" class="fa fa-home icon-angle-up" aria-hidden="true"></i>
@include('web.layout.script')
</body>
</html>
