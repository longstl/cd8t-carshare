@extends('web.layout.master')
@section('title')
    Map
@endsection
@section('headExtraJs')
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
                        window.alert("Please select an request from the dropdown list.");
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
@endsection
@section('content')
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
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong> {{ implode('', $errors->all(':message')) }}</strong>
                            </div>
                        @endif
                        <div class="contact-form-result"></div>

                        <form class="nobottommargin" id="template-contactform" ACTION="{{route('storeRide')}}" name="template-contactform"   method="POST">
                            @csrf
                            <div class="form-process"></div>

                            <div class="col_two_third">
                                <label for="origin-input">Origin</label>
                                <input type="text" id="origin-input" name="origin_address" value="" class="controls pac-target-input valid sm-form-control" required/>
                            </div>

                            <div class="col_two_third">
                                <label for="destination-input">Destination</label>
                                <input type="text" id="destination-input" name="destination_address"
                                       class="controls pac-target-input valid  sm-form-control" placeholder="Enter a destination location" autocomplete="off" aria-invalid="false" required/>
                            </div>

                            <div class="col_two_third">
                                <label>Start time</label>
                                <div class="form-group">
                                    <div class="input-group tleft" data-target-input="nearest" data-target=".datetimepicker">
                                        <input type="datetime-local" name="travel_start_time" class="form-control datetimepicker-input datetimepicker" data-target=".datetimepicker" placeholder="MM/DD/YYYY 00:00 AM/PM"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col_one_third">
                                <label for="number_of_seats">Seats</label>
                                <input type="number" id="number_of_seats" name="seats_available" onchange="if (this.value < 1){this.value=1}" class="controls sm-form-control" placeholder="Enter number of seats"/>
                            </div>
                            <div class="col_one_third">
                                <label for="template-contactform-service">Model rider</label>
                                <select id="select_vehicle" name="car_id" class="form-control form-select selectpicker sm-form-control">
                                    @foreach( $cars as $car)
                                        <option  selected hidden disabled> Car</option>
                                        <option value="{{$car->id}}">{{$car->model->make}}</option>
                                    @endforeach
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

    </section>
@endsection
@section('botExtraJs')
    <script>
        //show_distance
        $('#origin-input').change(function () {
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
                        $('#show_distance').text('Estimate : ' + $Json.rows[0].elements[0].distance.text)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })
            }
        })
        $('#destination-input').change(function () {
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
                        $('#show_distance').text('estimate : ' + $Json.rows[0].elements[0].distance.text)
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
        $(function () {
            $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
        });
    </script>
@endsection
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
