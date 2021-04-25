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
<script>
    $(function () {
        $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
    });
</script>


