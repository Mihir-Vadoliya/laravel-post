<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="eportal">
	<meta name="keywords" content="eportal">
	<meta name="author" content="eportal">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>


	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

	<!-- Multiselect option CSS-->
	<link rel="stylesheet" href="{{asset('assets/css/jquery.multiselect.css')}}">

	 @stack('styles')
	
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	
    <!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

	<!-- jQuery -->
	<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

	<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>

	<!-- header -->
    

	<!-- Main Wrapper -->
	<div class="main-wrapper">
    	
		<!-- Header -->
    	@include('layouts.partial.header')
		<!-- /Header -->

		<!-- Sidebar -->
		@include('layouts.partial.side-bar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		@yield('content')
		<!-- Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- Bootstrap Core JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

	<!-- Multiselect option CSS-->
	<script src="{{asset('assets/js/jquery.multiselect.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('assets/js/app.js')}}"></script>
	 @stack('scripts')

</body>

</html>