<script>
    document.addEventListener("DOMContentLoaded",function (){
        var that = document.getElementById('page_active')
        var thiz = document.querySelectorAll('li.nav-item')
        for (let i = 0; i < thiz.length; i++) {
            console.log(that.value)
            if (thiz[i].slot === that.value){
                thiz[i].classList.add('active')
                console.log(that.value)
            }else thiz[i].classList.remove('active')
        }
    })
</script>
<script src="{{lib_assets('web/js/jquery.js')}}"></script>
<script src="{{lib_assets('web/js/plugins.js')}}"></script>
<script src="{{lib_assets('web/js/functions.js')}}"></script>
<script src="{{lib_assets('web/js/jquery.gmap.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded',function (){
        document.getElementById('top-search').onclick = function (){
            document.querySelector('#sign-iu').classList.toggle('sign-iu');
            document.querySelector('#sign-iu').classList.toggle('sign-iu1');
        }
    })
</script>
<script src="{{lib_assets('script/core/jquery.min.js')}}"></script>
<script src="{{lib_assets('script/core/popper.min.js')}}"></script>
<script src="{{lib_assets('script/table.js')}}"></script>
<script src="{{lib_assets('web/js/components/moment.js')}}"></script>
<script src="{{lib_assets('web/js/components/datepicker.js')}}"></script>
<script src="{{lib_assets('web/js/components/timepicker.js')}}"></script>
<script src="{{lib_assets('script/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{Url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js')}}"></script>
<script src="{{url('https://unpkg.com/default-passive-events')}}"></script>
<script src="{{lib_assets('script/plpcugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{url('https://buttons.github.io/buttons.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="{{url('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')}}"></script>
<!-- Chartist JS -->
<script src="{{lib_assets('script/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{lib_assets('script/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{lib_assets('script/material-dashboard.js?v=2.1.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{lib_assets('script/demo/demo.js')}}"></script>
<script src="{{Url('https://maps.googleapis.com/maps/api/js?key=AIzaSyARQDGY6bvtZHavFPoCWEgmzxk7DLSbmoI&callback=initMap&libraries=places&v=weekly')}}"
async></script>

<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function () {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function () {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function () {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>

