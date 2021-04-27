<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    @include('web.layout.style')

    <title>Welcome | Car share</title>

</head>
<body class="stretched ">
<div id="wrapper" class="clearfix">
    <header id="header" class="transparent-header dark full-header no-sticky">
        <div id="header-wrap">
            <div class="container clearfix">

                    <div style="height: 100%;position: absolute;left: 50px">
                        <h1 id="top-search-trigger" style="font-family: 'Raleway', sans-serif;line-height: 100px;cursor: pointer;float: left">ENTER YOUR NAME</h1>
                    </div>
                    <div id="top-search">
                        <form action="#">
                            <input style="line-height: 100px" type="text" name="get_name" id="get_name" class="form-control" value=""
                                   placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div>


            </div>

        </div>

    </header><!-- #header end -->

    <section id="slider" class="slider-element force-full-screen full-screen">
        <div class="force-full-screen full-screen dark"
             style="background: url('{{lib_assets('img/baner3.jpg')}}') no-repeat; background-size: cover;padding-top: 100px;height: 800px!important;opacity: 0.9">
            <div class="container clearfix" style="z-index: 1000">
                <div class="slider-caption slider-caption-center">
                    <h2 id="txt_welcome" data-animate="fadeInDown"></h2><br>
                    <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="400" style="color: #000;font-weight: normal;">
                        Start a journey with our fun experiences with  our car share press the start button now
                    </p>
                    <a data-animate="fadeInUp" data-delay="600" href="{{route('index')}}"
                       class="button button-border button-light button-rounded button-large noleftmargin nobottommargin d-none d-md-inline-block"
                       style="margin-top: 30px; background: white;color: black">Start Now</a>
                </div>
            </div>

        </div>

    </section>

    <!-- Footer
    ============================================= -->
    @include('web.layout.footer')
</div>

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<script>
    document.addEventListener('DOMContentLoaded',function (){
        document.querySelector('#top-search-trigger').onclick = function (){
            this.style.opacity = 0;
        }
    document.onclick = function (){
        document.querySelector('#top-search-trigger').style.opacity = 1;
        document.querySelector('body').classList.remove('top-search-open')
    }
    })
</script>
@include('web.layout.script')
<script>
    document.addEventListener('DOMContentLoaded',function (){



        if (!localStorage.getItem('get_name')){
            $('#txt_welcome').text('Welcome to CarShare')
        }else {
            $('#txt_welcome').text('Hello '+ localStorage.getItem('get_name') + '\n welcome to Carshare')
        }



        $(document).on('keypress',function(e) {
            if(e.which === 13 && $('#get_name').val().length > 2) {
                localStorage.setItem('get_name',$('#get_name').val())
            }else {
                $('#top-search-trigger').css('opacity',0)
                $('body').addClass('top-search-open')
                $("#get_name").attr("placeholder", "PLEASE ENTER A NAME BEFORE PROCEEDING !!!").placeholder();
            }
        });
    })

</script>

</body>
</html>
