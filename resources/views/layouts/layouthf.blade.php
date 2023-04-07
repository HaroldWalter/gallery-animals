<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <title>{{ config('app.name', "Un simple blog d'animaux") }} - @yield('title')</title>

    @vite(['resources/css/app.css', 'ressources/js/app.js'])

</head>

<body>
    <header>
        @include('layouts.navigation')
    </header>
    @yield('content')
    <footer></footer>
    @vite(['resources/js/app.js'])

</body>

</html>
