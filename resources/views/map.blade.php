<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{lib_assets('bootstrap/css/bootstrap.min.css')}}">
    <style type="text/css">
        #map {
            width: 100%;
            height: 100%;
        }

        html,
        body {
            height: 1500px;
            margin: 0;
            padding: 0;
        }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #origin-input, #destination-input, #start-time {
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 200px;
        }

        #origin-input:focus,
        #destination-input:focus {
            border-color: #4d90fe;
        }

        #mode-selector {
            color: #fff;
            background-color: #4d90fe;
            margin-left: 12px;
            padding: 5px 11px 0px 11px;
        }

        #mode-selector label {
            font-family: Roboto, serif;
            font-size: 13px;
            font-weight: 300;
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
                this.setupClickListener(
                    "changemode-walking",
                    google.maps.TravelMode.WALKING
                );
                this.setupClickListener(
                    "changemode-transit",
                    google.maps.TravelMode.TRANSIT
                );
                this.setupClickListener(
                    "changemode-driving",
                    google.maps.TravelMode.DRIVING
                );
                this.setupPlaceChangedListener(originAutocomplete, "ORIG");
                this.setupPlaceChangedListener(destinationAutocomplete, "DEST");

                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                    modeSelector
                );
            }

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            setupClickListener(id, mode) {
                const radioButton = document.getElementById(id);
                radioButton.addEventListener("click", () => {
                    this.travelMode = mode;
                    this.route();
                });
            }

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
    <div class="col-md-6 col-12" style="height: 1000px;position: sticky;top: 0;float: right">
        <div id="map"></div>
    </div>
<div class="col-md-6" style="height: 50px">

    <form action="">

    </form>

    <input id="origin-input" class="controls" type="text" placeholder="Enter an origin location"/>
    <input id="start-time" class="controls" type="text" placeholder="Travel star time">
    <input id="destination-input" class="controls" type="text" placeholder="Enter a destination location"/>

    <div style="display: none" id="mode-selector" class="controls">
        <input style="display: none" type="radio" name="type" id="changemode-walking" checked="checked"/>
        <label style="display: none" for="changemode-walking">Walking</label>
        <input style="display: none" type="radio" name="type" id="changemode-transit"/>
        <label style="display: none" for="changemode-transit">Transit</label>
        <input style="display: none" type="radio" name="type" id="changemode-driving"/>
        <label style="display: none" for="changemode-driving">Driving</label>
    </div>
</div>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARQDGY6bvtZHavFPoCWEgmzxk7DLSbmoI&callback=initMap&libraries=places&v=weekly"
    async
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).on('keypress', function (e) {
        if (e.which === 13 && $('#origin-input').val().length > 1 && $('#destination-input').val().length > 1) {
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
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            })
        }
    });
</script>
</body>
</html>
