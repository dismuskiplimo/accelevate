@php
  $shrink_nav = false;

  if(isset($route) && $route == 'home'){
    $shrink_nav = true;
  }
@endphp
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <link href="{{ my_asset('agency/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!-- Custom fonts for this template -->
    <link href="{{ my_asset('agency/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ my_asset('agency/css/agency.min.css') }}" rel="stylesheet">

    <link rel = "stylesheet" type = "text/css" href = "{{ my_asset('css/custom.css') }}">

    {{-- <script src="{{ my_asset('agency/vendor/jquery/jquery.min.js') }}"></script> --}}
    <script language = "Javascript" type = "text/javascript" src = "{{ my_asset('js/jquery-2.1.4.min.js') }}"></script>

  </head>

  <body id="page-top" style="{{ $shrink_nav ? '' : 'padding-top: 66px'  }}">
    @include('includes.agency.nav')
    @include('includes.bootstrap.messages')