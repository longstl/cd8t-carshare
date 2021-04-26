<header id="header" class="transparent-header dark full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <div id="logo">
                <a href="/" class="standard-logo"
                   data-dark-logo="{{lib_assets('web/images/logo.png')}}"><img
                        src="{{lib_assets('web/images/logo.png')}}" alt="Canvas Logo"></a>
                <a href="/" class="retina-logo" data-dark-logo="{{lib_assets('web/images/logo.png')}}"><img
                        src="{{lib_assets('web/images/logo.png')}}" alt="Canvas Logo"></a>
            </div>
            <i style="font-size: 35px;margin: 10px;float: right" class="fa fa-bars iconbar" aria-hidden="true"></i>
            <nav id="primary-menu" class="menu_top">

                <ul class="h-100">
                    <li class="current"><a href="index.html">
                            <div>HOME</div>
                        </a>
                    </li>
                    <li class="mega-menu"><a href="#">
                            <div>RULES</div>
                        </a>
                    </li>
                    <li><a href="#">
                            <div>FIND A RIDE</div>
                        </a>
                    </li>

                    <li class="mega-menu"><a href="#">
                            <div>ABOUT</div>
                        </a>
                    </li>
                    <li class="mega-menu"><a href="#">
                            <div>CONTACT</div>
                        </a>
                    </li>
                    <li class="mega-menu">
                        <a href="#">
                            <div style="display: inline; background-color: #1ABC9C !important; color: white;font-family: 'Raleway', sans-serif;font-weight: bold;letter-spacing: 1px;"
                                 class="btn">OFFER A RIDE
                            </div>
                        </a>
                    </li>
                </ul>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <div class="position-relative" id="top-search" style="width: 90px">
                        <div style="width: 50%;float: left">
                            <a class="btn_account"><i class="fas fa-user" style="font-size: 20px"></i></a>
                        </div>
                    </div>
                @else()
                    <div class="position-relative" id="top-search" style="width: 90px">
                        <div style="width: 50%;float: left">
                            <a class="btn_account"><b style="cursor: pointer">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</b></a>
                        </div>
                        @endif
                        <div style="width: 50%;float: left; cursor: pointer">
                            <a>
                                <i style="font-size: 20px" class="fa fa-bell" aria-hidden="true">
                                    <p style=" display: flex;justify-content: center;align-items: center;height: 14px;width: 14px;font-size: 10px;border-radius: 50%;background: #08eff8
                                    ;position: absolute;top: -8px;right: -12px ">3</p></i>
                            </a>
                        </div>
                    </div>
                <div class="top-cart-content notification"
                     style="right: 0; width: 350px; background: #f7f5f5;   position: absolute;top: 100%;">
                    <div class="top-cart-title">
                        <h4>Notification</h4>
                    </div>

                    @for($i = 0 ; $i < 5; $i++)
                        @if($i ==1)
                            <a href="">
                                <div style="padding: 10px;border-bottom: #565656 2px solid ;"
                                     class="top-cart-item clearfix border border-danger">
                                    <span style="color: red">new</span>
                                    <p style="color: black"><span style="font-weight: bold">Title : </span>day la
                                        Notification {{$i+1}}</p>
                                </div>
                            </a>
                        @endif
                        <a href="">
                            <div style="padding: 10px;border-bottom: #565656 2px solid ;"
                                 class="top-cart-item clearfix border border-danger">
                                <p style="color: black"><span style="font-weight: bold">Title : </span>day la
                                    Notification {{$i+1}}</p>
                            </div>
                        </a>
                    @endfor


                    <div class="top-cart-action clearfix" style="background: #565656">
                        <button class="button button-3d button-small nomargin fright">Clear</button>
                    </div>
                </div>
                @if(!\Illuminate\Support\Facades\Auth::check())
                        <div id="account" class="accountn" style="position: absolute;bottom: -50px;right: 10px">
                            <a href="" class="btn btn-success " style="margin-right: 5px">Login</a>
                            <a href="" class="btn btn-warning">Register</a>
                        </div>
                    @else()
                        <div id="account" class="accountn" style="position: absolute;bottom: -50px;right: 10px">
                            <a href="" class="btn btn-success " style="margin-right: 5px">Profile</a>
                            <a href="" class="btn btn-warning">Logout</a>
                        </div>
                    @endif
            </nav>
        </div>
    </div>
</header>
