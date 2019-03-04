<!doctype html>
<html>
	<head>
		<title></title>
		<meta charset = "utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "Shortcut Icon" type = "Image/X-icon" href = "favicon.ico" />
		<link rel = "stylesheet" type = "text/css" href = "{{ my_asset('css/bootstrap.min.css') }}" />
		<link rel = "stylesheet" type = "text/css" href = "{{ my_asset('css/font-awesome.min.css') }}" />
		<link href="{{ asset('css/patros.css') }}" rel="stylesheet" type="text/css" media="all" />
		<link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />
		
		<link rel = "stylesheet" type = "text/css" href = "{{ my_asset('css/custom.css') }}" />

		<script language = "Javascript" type = "text/javascript" src = "{{ my_asset('js/jquery-2.1.4.min.js') }}"></script>
	</head>
	<body>
		
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ route('homepage') }}" title = "">
						<img src="{{ my_asset('img/logo-dark.png') }}" alt="{{ config('app.name') }}" class="size-40">
						
					</a>
				</div>
				<div class="collapse navbar-collapse" id="collapse1">
					@include('includes.bootstrap.nav')
				</div>
			</div>
		</nav>
		