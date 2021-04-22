<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="{{asset('public/js/html5shiv.js')}}"></script>
    <script src="{{asset('public/js/respond.min.js')}}"></script>
    <![endif]-->
	<link rel="shortcut icon" href="{{asset('public/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('public/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<style>
		.all-center{
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
</head><!--/head-->

<body>
@include('layouts.header')

<main class="pt-2">
	@yield('content')
</main>

@include('layouts.footer')
</body>
</html>
