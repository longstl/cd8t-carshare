<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{lib_assets('bootstrap/css/bootstrap.min.css')}}">
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
                height: 1000px;
                position: sticky;
                top: 0;
                float: right
            }

            form {
                padding-bottom: 100px;
                margin: auto;
                padding-top: 100px;
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
    <title>Document</title>
</head>
<body>
<div>
    <div class="col-md-6 col-12 container_map">
        <div id="map"></div>
    </div>
    <div class="col-md-6" style="height: 50px">

        <form action="" method="GET" name="register_create_trip" id="register_create_trip" class="col-md-8 col-12">
            <input type="hidden" name="range" id="range">
            <input type="hidden" name="intend_time" id="intend_time">
            <h1>Create a new trip</h1>
            <br>
            <h4 class="text-secondary" style="font-family: sans-serif" id="show_distance"></h4>
            <br>
            <div class=" row col-md-10 col-10">
                <div class="form-group">
                    <label for="origin-input">Origin</label>
                    <input name="origin_input" id="origin-input" class="col-md-12 form-control controls" type="text"
                           placeholder="Enter an origin location"/>
                </div>
            </div>
            <br>
            <div class=" row col-md-10 col-10">
                <div class="form-group">
                    <label for="destination-input">Destination</label>
                    <input name="destination_input" id="destination-input" class="form-control controls" type="text"
                           placeholder="Enter a destination location"/>
                </div>
            </div>
            <br>
            <div class=" row col-md-8 col-11">
                <div class="form-group">
                    <label for="start-time">Date</label>
                    <input name="start_time" id="start-time" class="form-control controls" type="date">
                </div>
            </div>
            <br>
            <div class=" row col-md-8 col-11">
                <div class="form-group">
                    <label for="start-time">Star time</label>
                    <input name="start_time" id="start-time" class="form-control controls" type="text"
                           placeholder="Travel star time">
                </div>
            </div>

            <br>
            <div class=" row col-md-12 col-11">
                <div class="form-group col-4 col-md-4">
                    <label for="number_of_seats">seats</label>
                    <input name="number_of_seats" onchange="if (this.value < 1){this.value=1}" id="number_of_seats"
                           class=" form-control controls" type="number" placeholder="Enter number of seats">
                </div>
                <div class="form-group col-6 col-md-6">
                    <label for="select_vehicle">Model rider</label><br>
                    <select class="form-control form-select selectpicker" name="rider" id="select_vehicle">
                        <option value="" selected>Maybach s650</option>
                        <option value="">Maybach s650</option>
                        <option value="">Maybach s650</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row col-12 col-md-12">
                <div class="form-group col-5 col-md-5">
                    <button id="submit" type="submit" class="form-control btn btn-primary">Create</button>
                </div>
                <div class="form-group col-5 col-md-5">
                    <button type="reset" class="form-control btn btn-primary">Remove</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARQDGY6bvtZHavFPoCWEgmzxk7DLSbmoI&callback=initMap&libraries=places&v=weekly"
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
</body>
</html>
