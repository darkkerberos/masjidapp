<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
		<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>{{ config('app.name') }}</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<!-- Canonical SEO -->
		<!-- <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro" /> -->
		<!--  Social tags      -->
		<meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
		<meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
		<meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
		<!-- <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"> -->
		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@creativetim">
		<meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
		<meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
		<meta name="twitter:creator" content="@creativetim">
		<!-- <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"> -->
		<!-- Open Graph data -->
		<!--
			<meta property="fb:app_id" content="655968634437471">
			<meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
			<meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
			<meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
			<meta property="og:site_name" content="Creative Tim" />
		-->
		<!-- Bootstrap core CSS     -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
		<!--  Material Dashboard CSS    -->
		<link href="{{ asset('css/material-dashboard23cd.css') }}" rel="stylesheet" />
		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
		<!--     Fonts and icons     -->
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
{{--        <link href="{{ asset('plugins/cropperjs/dist/cropper.css') }}" rel="stylesheet">--}}
        <link href="{{ asset('plugins/croppie-2.6.2/croppie.css') }}" rel="stylesheet">
	</head>

	<body>
		<div class="wrapper">
			<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
				<!--
					Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
					Tip 2: you can also add an image using data-image tag
					Tip 3: you can change the color of the sidebar with data-background-color="white | black"
				-->
        @include('adminlayouts.include.sidebar')
			</div>
			<div class="main-panel">
        @include('adminlayouts.include.navbar')
				<div class="content">
					@yield('content')
				</div>
        @include('adminlayouts.include.footer')
			</div>
		</div>
		<!--

			Fixed Plugin

		-->
	</body>
	<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
	<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/arrive.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/moment.min.js') }}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('js/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!--   Sharrre Library    -->
<script src="{{ asset('js/jquery.sharrre.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
<script src="{{ asset('js/material-dashboard23cd.js?v=1.2.') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<style>
	.imageThumb {
		display: inline-block;
		width: 200px;
		height: 200px;
		margin: 5px;
		border: 3px solid #c99;
		background-position: center center;
		background-size: cover;
	}
</style>
@yield('scripts')
</html>
