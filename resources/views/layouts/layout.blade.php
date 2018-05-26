<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="materialize is a material design based mutipurpose responsive template">
    <meta name="keywords" content="material design, card style, material template, portfolio, corporate, business, creative, agency">
    <meta name="author" content="dkerberos">
    <title>Al-magfiroh</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/ico/favicon.png') }}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/img/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/img/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/img/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/ico/apple-touch-icon-57-precomposed.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>

    <link href="{{ asset('assets/fonts/iconfont/material-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/owl.carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/materialize/css/materialize.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/shortcodes/shortcodesae52.css?v=5') }}" rel="stylesheet">

    <link href="{{ asset('assets/styleae52.css?v=5') }}" rel="stylesheet">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/shortcodes/noui-slider.css') }}" rel="stylesheet">
    @yield('style')


    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body id="top" class="has-header-search">

<!-- header -->
@include('layouts.include.header')

<!-- content -->
@yield('content')

<!-- footer -->
@include('layouts.include.footer')
<!-- preloader -->
@include('layouts.include.preloader')


<script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('assets/js/menuzord.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.min.js') }}"></script>
<script src="{{ asset('assets/js/smoothscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.shuffle.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tabcollapse.min.js') }}"></script>
<script src="{{ asset('assets/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/flexSlider/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('assets/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/scriptsae52.js?v=5') }}"></script>
<script src="{{ asset('assets/js/PrayTimes.js') }}"></script>
<script src="{{ asset('js/utils.js') }}" ></script>
<script src="{{ asset('assets/js/jadwal.js') }}" ></script>
<script src="{{ asset('assets/js/jquery.marquee.js') }}" ></script>
<script src="{{ asset('assets/plugin/jquery-ui-1.12.1/jquery-ui.min.js') }}" ></script>
<script src="{{ asset('js/nouislider.min.js') }}" ></script>
<script type="text/javascript">
    $(document).ready(function(){
        //$('#tblJadwaSolat').tableHeadFixer();
        var jadwal = jadwalSolat.hariIni();
        $('#imsyak').html(jadwal.imsak);
        $('#subuh').html(jadwal.subuh);
        $('#dzuhur').html(jadwal.dzuhur);
        $('#ashar').html(jadwal.ashar);
        $('#magrib').html(jadwal.magrib);
        $('#isya').html(jadwal.isya);

        $('#kalender').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });

        var slider = document.getElementById('sliderRegular');

        noUiSlider.create(slider, {
            start: 0.2,
            connect: [true, false],
            range: {
                min: 0,
                max: 1
            }
        });

    });
    jadwalSolat.initAdzan();
    $("#pengumumanText").marquee({duration:2000,gap:50,delayBeforeStart:0,direction:"left",pauseOnHover:!0});
</script>
@yield('scripts')
</body>
</html>