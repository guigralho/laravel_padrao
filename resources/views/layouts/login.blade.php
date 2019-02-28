<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.favicons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bourbon') }}</title>

    <!-- fontes -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('site/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/bower_components/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/bower_components/flickity/dist/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/bower_components/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('site/styles/main.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ asset('site/bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <![endif]-->
</head>
<body class="fixed-header">
    @yield('content')

    <!-- scripts -->
    <script src="{{ asset('site/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('site/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/bower_components/flickity/dist/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('site/bower_components/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ asset('site/scripts/functions.js') }}"></script>
</body>
</html>
