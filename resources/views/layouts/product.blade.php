<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShoppingApp - @yield('title')</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <!---Header----->
    @include('layouts.header')
    <!----EndHeader---------->
    @yield('content')
</body>
</html>
