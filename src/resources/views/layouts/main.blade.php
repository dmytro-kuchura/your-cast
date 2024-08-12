<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="text" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@yield('content')
@vite('resources/sass/app.scss')
</body>
</html>
