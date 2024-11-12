<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="text" content="">
    <meta name="author" content="">

    <link rel="icon" href="/favicon.ico">
    <link rel="icon" type="image/png" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="google-adsense-account" content="ca-pub-5814626884787416">

    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@yield('content')
@vite('resources/sass/app.scss')
</body>
</html>
