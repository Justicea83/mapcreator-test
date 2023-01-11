<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"><!---->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MapCreator Test | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">

<div class="min-h-full">
    @include('auth.partials.header')
    <div class="py-10">
        @yield('content')
    </div>
</div>
@livewireScripts
</body>
</html>
