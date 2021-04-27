<script src="{{lib_assets('web/js/jquery.js')}}"></script>
<script src="{{lib_assets('web/js/plugins.js')}}"></script>
<script src="{{lib_assets('web/js/functions.js')}}"></script>
<script src="{{lib_assets('web/js/jquery.validate.min.js')}}"></script>
<script src="{{lib_assets('web/js/popper.min.js')}}"></script>
<script src="{{lib_assets('web/js/bootstrap.min.js')}}"></script>
<script src="{{lib_assets('web/js/components/moment.js')}}"></script>
<script src="{{lib_assets('web/js/components/datepicker.js')}}"></script>
<script src="{{lib_assets('web/js/components/timepicker.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.btn_account').onclick = function () {
            document.querySelector('#account').classList.toggle('accountn')
        }
        document.querySelector('.iconbar').onclick = function () {
            document.querySelector('#primary-menu').classList.toggle('menu_top')
        }
        document.getElementById('top-search').onclick = function () {
            document.querySelector('#sign-iu').classList.toggle('sign-iu');
            document.querySelector('#sign-iu').classList.toggle('sign-iu1');
        }

        $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
        jQuery("#tabs-profile").on("tabsactivate", function (event, ui) {
            jQuery('.flexslider .slide').resize();
        });
        $('.fa-bell').click(function () {
            axios.get("{{route('markRead', \Illuminate\Support\Facades\Auth::id())}}").then(response => {
                $('#unread-notification-count').text("0")
            }).catch(e => console.log(e));
            $('.top-cart-content').toggleClass('notification')
        });

        $('#btn-delete').click(function (event) {
            var r = confirm("Press a button!\nEither OK or Cancel.\nDo you want to delete your account ?");
            event.preventDefault();
            if (r == true) {
                window.location.href = "{{{route('form_comfim_password')}}}"
            }
        })

        if (typeof localStorage.getItem('get_name') == "object"){

                $('#show_get_name').text(`LOOKING FOR A RIDE?`)

        }else {
            if ($('input[name = check_login]').val() === 'out'){
                $('#show_get_name').text(`HELLO ${localStorage.getItem('get_name')}, LOOKING FOR A RIDE?`)
            }
        }
    })

    document.addEventListener("DOMContentLoaded",function (){
        var that = document.getElementById('page_active')
        var thiz = document.querySelectorAll('.mega-menu')
        for (let i = 0; i < thiz.length; i++) {
            if (thiz[i].slot === that.value){
                thiz[i].classList.add('current')
            }else thiz[i].classList.remove('current')
        }
    })


</script>
