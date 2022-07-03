<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorBtcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- csrf-token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@widget('header')
<main>
    @yield('content')
</main>
@widget('footer')
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>


