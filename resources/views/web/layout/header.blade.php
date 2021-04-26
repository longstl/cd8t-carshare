<style>
    .log-hover:hover {
        background-color: #c1c1c1;
    }
</style>

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
            <i style="font-size: 35px;margin: 10px;float: right;" class="fa fa-bars iconbar" aria-hidden="true"></i>
            <nav id="primary-menu" class="menu_top">
                <ul class="h-100">
                    <li class="current"><a href="{{route('index')}}">
                            <div>HOME</div>
                        </a>
                    </li>
                    <li class="mega-menu"><a href="#">
                            <div>RULES</div>
                        </a>
                    </li>
                    <li><a href="{{route('createRequest')}}">
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

                        <a href="{{route('createRide')}}">
                            <div style="display: inline; background-color: #1ABC9C !important; color: white"

                                 class="btn">OFFER A RIDE
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="position-relative" id="top-search" style="width: 90px">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <div style="width: 50%;float: left">
                            <a class="btn_account"><i class="fas fa-user" style="font-size: 20px"></i></a>
                        </div>
                    @else()
                        <div style="width: 50%;float: left">
                            <a class="btn_account"><b style="font-size: 20px; cursor: pointer">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</b></a>
                        </div>
                    @endif
                    <div style="width: 50%;float: left">
                        <a>
                            <i style="font-size: 20px" class="fa fa-bell" aria-hidden="true">
                                <p style=" display: flex;justify-content: center;align-items: center;height: 14px;width: 14px;font-size: 10px;border-radius: 50%;background: #08eff8
                                    ;position: absolute;top: -8px;right: -12px; cursor: pointer">3</p></i>
                        </a>
                    </div>
                </div>
                <div class="top-cart-content notification"
                     style="box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 -1px 0px rgb(0 0 0 / 2%);border-top: 2px solid #1ABC9C;right: 0; width: 350px; background: #fff;position: absolute;top: 100%;">
                    <div class="top-cart-title">
                        <h4>Notification</h4>
                    </div>
                    <div style="padding: 0 15px 12px 15px;">
                        @for($i = 0 ; $i < 5; $i++)
                            @if($i ==1)
                                <a href="">
                                    <div style="padding: 15px 0;border-bottom: 1px solid #EEE;"
                                         class="top-cart-item clearfix border border-danger">
                                        <span style="color: red">new</span>
                                        <p style="color: black; margin: 0;"><span style="font-weight: bold">Title : </span>day la
                                            Notification {{$i+1}}</p>
                                    </div>
                                </a>
                            @endif
                            <a href="">
                                <div style="padding: 15px 0;border-bottom: 1px solid #EEE;"
                                     class="top-cart-item clearfix border border-danger">
                                    <p style="color: black; margin: 0;"><span style="font-weight: bold">Title : </span>day la
                                        Notification {{$i+1}}</p>
                                </div>
                            </a>
                        @endfor


                        <div class="top-cart-action clearfix" style="border-top: 0">
                            <button class="button button-3d button-small nomargin fright">Clear</button>
                        </div>
                    </div>
                </div>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <div id="account" class="accountn" style="border-top: 2px solid #1ABC9C;box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 -1px 0px rgb(0 0 0 / 2%);width: 130px;background-color: #ffffff;position: absolute;  top: 100%; right: 87px;">
                        <div style="padding: 5px; border-bottom: 1px solid lightgray;" class="log-hover">
                            <a href="{{route('loginUser')}}" class="btn" style="margin-right: 5px;color: black">Login</a>
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <div style="padding: 5px" class="log-hover">
                            <a href="{{route('registerUser')}}" class="btn" style="color: black">Register</a>
                        </div>
                    </div>
                @else()
                    <div id="account" class="accountn" style="border-top: 2px solid #1ABC9C;box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 -1px 0px rgb(0 0 0 / 2%);width: 130px;color: black; background-color: #ffffff;position: absolute;  top: 100%; right: 87px;">
                        <div style="padding: 5px" class="log-hover">
                            <a href="{{route('profile_user')}}" class="btn" style="color: black;margin-right: 5px">Profile</a>
                        </div>
                        <div style="padding: 5px" class="log-hover">
                            <a href="{{route('logoutUser')}}" class="btn" style="color: black">Logout</a>
                            <i class="fa fa-sign-out"></i>
                        </div>
                    </div>
                @endif
            </nav>
        </div>
    </div>
</header>
