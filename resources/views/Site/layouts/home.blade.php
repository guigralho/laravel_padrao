<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.favicons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BeBack') }}</title>

    @include('Site.includes.header_scripts')

</head>
<body>
    @include('Site.includes.header')

    @yield('content')

    @include('Site.includes.footer')
</body>
</html>