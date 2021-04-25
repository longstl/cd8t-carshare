<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{lib_assets('Client_css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{lib_assets('Client_css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="{{lib_assets('Client_css/responsive.css')}}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{lib_assets('Client_css/settings.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{lib_assets('Client_css/settings.css')}}include/rs-plugin/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{lib_assets('Client_css/settings.css')}}include/rs-plugin/css/navigation.css">

    <link rel="stylesheet" href="{{URL('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<!-- Document Title
	============================================= -->
	<title>Map</title>

    <style>

        .container input {
            opacity: 1!important;
            position: inherit!important;
        }
        .tp-caption.NotGeneric-CallToAction, .NotGeneric-CallToAction {
            text-align: center!important;
        }
        .revtp-searchform input[type="text"] {
            width: auto !important;
        }
        .sign-iu {
            display:none;
            right: 0;
            width: 130px;
            position: absolute;
            top: 60px;
            -webkit-transition: opacity .5s ease, top .4s ease;
            -o-transition: opacity .5s ease, top .4s ease;
            transition: opacity .5s ease, top .4s ease;
        }
        .sign-iu1 {
            display:block;
            right: 0;
            width: 130px;
            position: absolute;
            top: 60px;
            -webkit-transition: opacity .5s ease, top .4s ease;
            -o-transition: opacity .5s ease, top .4s ease;
            transition: opacity .5s ease, top .4s ease;
        }
    </style>
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }
        @media only screen and (min-width: 600px) {
            #map {
                width: 100%;
                height: 100%;
            }
            .container_map {
                height: 400px;
                position: sticky;
                top: 0;
                float: right
            }
            form {
                margin: auto;
            }
        }
        @media only screen and (max-width: 599px) {
            #map {
                width: 100%;
                height: 100%;
            }
            .container_map {
                height: 600px;
                position: absolute;
                top: 490px;
                float: left;
            }
            form {
                margin: auto;
                padding-top: 20px;
            }
        }
        #origin-input:focus,
        #destination-input:focus {
            border-color: #4d90fe;
        }
        #mode-selector label {
            font-family: Roboto, serif;
            font-size: 13px;
            font-weight: 300;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
    <script>
        let markerOptions;
        let markerShow;

        function initMap() {
            let $lat = 0;
            let $lng = 0;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }

            function showPosition(position) {
                $lat = position.coords.latitude;
                $lng = position.coords.longitude;

                const map = new google.maps.Map(document.getElementById("map"), {
                    mapTypeControl: false,
                    center: {lat: $lat, lng: $lng},
                    zoom: 18,
                });
                let origin = $('#origin-input')
                origin.val($lat + ',' + $lng)


                markerOptions = {
                    position: {lat: $lat, lng: $lng},
                    map: map,
                    animation: google.maps.Animation.BOUNCE,
                    id: 1
                };
                markerShow = new google.maps.Marker(markerOptions);
                new AutocompleteDirectionsHandler(map);
            }
        }
        class AutocompleteDirectionsHandler {
            constructor(map) {
                this.map = map;
                this.originPlaceId = "";
                this.destinationPlaceId = "";
                this.travelMode = google.maps.TravelMode.WALKING;
                this.directionsService = new google.maps.DirectionsService();
                this.directionsRenderer = new google.maps.DirectionsRenderer();
                this.directionsRenderer.setMap(map);
                const originInput = document.getElementById("origin-input");
                const destinationInput = document.getElementById("destination-input");
                const modeSelector = document.getElementById("mode-selector");
                const originAutocomplete = new google.maps.places.Autocomplete(
                    originInput
                );
                // Specify just the place data fields that you need.
                originAutocomplete.setFields(["place_id"]);
                const destinationAutocomplete = new google.maps.places.Autocomplete(
                    destinationInput
                );
                // Specify just the place data fields that you need.
                destinationAutocomplete.setFields(["place_id"]);

                this.setupPlaceChangedListener(originAutocomplete, "ORIG");
                this.setupPlaceChangedListener(destinationAutocomplete, "DEST");

                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                    modeSelector
                );
            }

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.


            setupPlaceChangedListener(autocomplete, mode) {
                autocomplete.bindTo("bounds", this.map);
                autocomplete.addListener("place_changed", () => {
                    const place = autocomplete.getPlace();
                    if (!place.place_id) {
                        window.alert("Please select an option from the dropdown list.");
                        return;
                    }

                    if (mode === "ORIG") {
                        this.originPlaceId = place.place_id;
                    } else {
                        this.destinationPlaceId = place.place_id;
                    }
                    this.route();
                });
            }

            route() {
                console.log(this.map.getBounds().contains(markerOptions['position']))
                if (this.map.getBounds().contains(markerOptions['position'])) {
                    markerShow.visible = false;
                }
                if (!this.originPlaceId || !this.destinationPlaceId) {
                    return;
                }
                const me = this;
                this.directionsService.route(
                    {
                        origin: {placeId: this.originPlaceId},
                        destination: {placeId: this.destinationPlaceId},
                        travelMode: this.travelMode,
                    },
                    (response, status) => {
                        if (status === "OK") {
                            me.directionsRenderer.setDirections(response);
                        } else {
                            window.alert("Directions request failed due to " + status);
                        }
                    }
                );
            }
        }
    </script>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
        <header id="header" class="transparent-header dark full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="" class="standard-logo" data-dark-logo="{{lib_assets('Images_client/logo-dark.png')}}"><img
                                src="{{lib_assets('Images_client/logo.png')}}" alt="Canvas Logo"></a>
                        <a href="" class="retina-logo" data-dark-logo="{{lib_assets('Images_client/logo-dark@2x.png')}}"><img
                                src="{{lib_assets('Images_client/logo@2x.png')}}" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">
                        <ul class="h-100">
                            <li class="current"><a href="#">
                                    <div>HOME</div>
                                </a>
                            </li>
                            <li><a href="#">
                                    <div>FIND A RIDE</div>
                                </a>
                            <li class="mega-menu"><a href="#">
                                    <div>RULES</div>
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
                                    <div style="display: inline; background-color: #1ABC9C !important; color: white" class="btn">OFFER A RIDE</div>
                                </a>
                            </li>
                        </ul>

                        <!-- Top Cart
                        ============================================= -->
                        <div id="top-cart">
                            <a href="#" id="top-cart-trigger"><i class="fas fa-bell"></i><span>5</span></a>
                            <div class="sign-iu" id="sign-iu" style="position: absolute">
                                <div class="sig-items">
                                    <a href="#">Sign In</a>
                                </div>
                                <div class="sig-items">
                                    <a href="#">Sign Up</a>
                                </div>

                            </div>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="{{lib_assets('Images_client/shop/small/1.jpg')}}"
                                                             alt="Blue Round-Neck Tshirt"/></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="{{lib_assets('Images_client/shop/small/6.jpg')}}"
                                                             alt="Light Blue Denim Dress"/></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <button class="button button-3d button-small nomargin fright">View Cart</button>
                                </div>
                            </div>
                        </div><!-- #top-cart end -->

                        <!-- Top Search
                        ============================================= -->
                        <div class="" id="top-search">
                            <!--                        id="top-search-trigger"-->

                            <a><i class="fas fa-user" onclick="">
                                </i></a>


                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Contact Form
					============================================= -->
					<div class="col_half">
						<div class="fancy-title title-dotted-border">
							<h3>Create a new trip</h3>
						</div>

						<div class="contact-widget">

							<div class="contact-form-result"></div>

							<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

								<div class="form-process"></div>

								<div class="col_two_third">
									<label for="origin-input">Origin</label>
									<input type="text" id="origin-input" name="origin_input" value="" class="controls pac-target-input valid sm-form-control required"/>
								</div>

								<div class="col_two_third">
									<label for="destination-input">Destination</label>
									<input type="text" id="destination-input" name="destination_input"
                                           class="controls pac-target-input valid required  sm-form-control" placeholder="Enter a destination location" autocomplete="off" aria-invalid="false"/>
								</div>

								<div class="col_two_third">
									<label for="start-time">Date</label>
									<input type="date" id="start-time" name="start_time" value="" class="sm-form-control controls" placeholder="Travel star time"/>
								</div>

								<div class="clear"></div>

								<div class="col_one_third">
									<label for="start-time">Start Time</label>
									<input type="text" id="start-time" name="start_time" class="controls required sm-form-control" placeholder="Enter number of seats"/>
								</div>

								<div class="col_one_third">
									<label for="number_of_seats">Seats</label>
									<input type="number" id="number_of_seats" name="number_of_seats" onchange="if (this.value < 1){this.value=1}" class="controls sm-form-control" placeholder="Enter number of seats"/>
								</div>
								<div class="col_one_third">
									<label for="template-contactform-service">Model rider</label>
									<select id="select_vehicle" name="rider" class="form-control form-select selectpicker sm-form-control">
										<option value selected>Maybach s650</option>
										<option value="">Maybach s650</option>
										<option value="">Maybach s650</option>
									</select>
								</div>
								<div class="clear"></div>
								<div class="col_full">
									<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Create</button>
                                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Remove</button>
								</div>
							</form>
						</div>

					</div><!-- Contact Form End -->

					<!-- Google Map
					============================================= -->
					<div class="col_half col_last pt-3" style="padding-top: 35px">

						<section id="google-map" class="gmap">
                            <div class="col-md-12 col-12 container_map">
                                <div id="map"></div>
                            </div>
                        </section>

					</div><!-- Google Map End -->

					<div class="clear"></div>
				</div>

			</div>

		</section><!-- #content end -->


	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->

	<script src="{{lib_assets('Client_js/jquery.js')}}"></script>
	<script src="{{lib_assets('Client_js/plugins.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{lib_assets('Client_js/functions.js')}}"></script>

	<script src="{{Url('https://maps.google.com/maps/api/js?key=YOUR_API_KEY')}}"></script>
	<script src="{{lib_assets('Client_js/jquery.gmap.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded',function (){
            document.getElementById('top-search').onclick = function (){
                document.querySelector('#sign-iu').classList.toggle('sign-iu');
                document.querySelector('#sign-iu').classList.toggle('sign-iu1');
            }
        })
    </script>
{{--    <script>--}}
{{--        jQuery('#google-map').gMap({--}}
{{--            address: 'Melbourne, Australia',--}}
{{--            maptype: 'ROADMAP',--}}
{{--            zoom: 14,--}}
{{--            markers: [--}}
{{--                {--}}
{{--                    address: "Melbourne, Australia",--}}
{{--                    html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',--}}
{{--                    icon: {--}}
{{--                        image: "images/icons/map-icon-red.png",--}}
{{--                        iconsize: [32, 39],--}}
{{--                        iconanchor: [32,39]--}}
{{--                    }--}}
{{--                }--}}
{{--            ],--}}
{{--            doubleclickzoom: false,--}}
{{--            controls: {--}}
{{--                panControl: true,--}}
{{--                zoomControl: true,--}}
{{--                mapTypeControl: true,--}}
{{--                scaleControl: false,--}}
{{--                streetViewControl: false,--}}
{{--                overviewMapControl: false--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
    <script src="{{Url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
    <script src="{{Url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js')}}"></script>
    <script
        src="{{Url('https://maps.googleapis.com/maps/api/js?key=AIzaSyARQDGY6bvtZHavFPoCWEgmzxk7DLSbmoI&callback=initMap&libraries=places&v=weekly')}}"
        async></script>
    <script>
        //show_distance
        $('#origin-input').change(function (){
            if ($('#origin-input').val().length > 1 && $('#destination-input').val().length > 1) {
                $value = {
                    "start": $('#origin-input').val(),
                    "end": $('#destination-input').val()
                }

                $.ajax({
                    url: "/api/location",
                    type: "post",
                    data: $value,
                    success: function (response) {
                        console.log(response);
                        $Json = JSON.parse(response)
                        $('#range').val($Json.rows[0].elements[0].distance.text)
                        $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                        $('#show_distance').text('Estimate : '+$Json.rows[0].elements[0].distance.text)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })
            }
        })
        $('#destination-input').change(function (){
            if ($('#origin-input').val().length > 1 && $('#destination-input').val().length > 1) {
                $value = {
                    "start": $('#origin-input').val(),
                    "end": $('#destination-input').val()
                }

                $.ajax({
                    url: "/api/location",
                    type: "post",
                    data: $value,
                    success: function (response) {
                        console.log(response);
                        $Json = JSON.parse(response)
                        $('#range').val($Json.rows[0].elements[0].distance.text)
                        $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                        $('#show_distance').text('estimate : '+$Json.rows[0].elements[0].distance.text)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })
            }
        })
        $('#submit').click(function () {
            if ($('#origin-input').val().length > 1 && $('#destination-input').val().length > 1) {
                $value = {
                    "start": $('#origin-input').val(),
                    "end": $('#destination-input').val()
                }
                $.ajax({
                    url: "/api/location",
                    type: "post",
                    data: $value,
                    success: function (response) {
                        console.log(response);
                        $Json = JSON.parse(response)
                        $('#range').val($Json.rows[0].elements[0].distance.text)
                        $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                        console.log($Json.rows[0].elements[0].distance.text);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })
            }
        })
    </script>
    <script>
        $("#register_create_trip").validate({
            rules: {
                origin_input: {
                    required: true
                },
                destination_input: {
                    required: true
                },
                start_time: {
                    required: true
                },
                number_of_seats: {
                    required: true
                }
            }, messages: {
                origin_input: {
                    required: 'you cannot skip this field'
                },
                destination_input: {
                    required: 'you cannot skip this field'
                },
                start_time: {
                    required: 'you cannot skip this field',
                },
                number_of_seats: {
                    required: 'you cannot skip this field'
                }
            }
        })
    </script>
    <script>
        $(function () {
            $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
        });
    </script>
</body>
</html>
