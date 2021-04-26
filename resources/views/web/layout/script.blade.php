<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.btn_account').onclick = function () {
            document.querySelector('#account').classList.toggle('accountn')
        }
        document.querySelector('.iconbar').onclick = function (){
            document.querySelector('#primary-menu').classList.toggle('menu_top')

        }

    })

</script>
<script src="{{lib_assets('web/js/jquery.js')}}"></script>
<script src="{{lib_assets('web/js/plugins.js')}}"></script>
<script src="{{lib_assets('web/js/functions.js')}}"></script>
<script src="{{lib_assets('web/js/jquery.gmap.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="{{URL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
<script src="{{URL('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
<script src="{{URL('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
    });
</script>

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
<script>
    jQuery( "#tabs-profile" ).on( "tabsactivate", function( event, ui ) {
        jQuery( '.flexslider .slide' ).resize();
    });
</script>

