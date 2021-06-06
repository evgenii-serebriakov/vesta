<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" 
            content="width=device-width, initial-scale=1, maximum-scale=1">

        <meta content="true" name="HandheldFriendly">
        <meta content="width" name="MobileOptimized">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta name="robots" content="noindex,nofollow">
        {{-- <meta name="robots" content="index,follow" /> --}}
        <link rel="canonical" href="https://vesta74.ru/">

        <title>{{ $title ?? 'Defaul'}}</title>
        {{-- <meta name="description" content="Центр реабилитации"> --}}
        <meta name="description" content="{{ $desc }}">
        <meta name="keywords" content="центр, реабилитация, массаж, веста, vesta, vesta74">
        <meta name="theme-color" content="#ffffff">
        
        <link rel="apple-touch-icon" 
            href="{{ mix('/assets/favicons/apple-touch-icon.png') }}" sizes="180x180">
        <link rel="icon" 
            href="{{ mix('/assets/favicons/favicon-32x32.png') }}" sizes="32x32" type="image/png">
        <link rel="icon" 
            href="{{ mix('/assets/favicons/favicon-16x16.png') }}" sizes="16x16" type="image/png">
        <link rel="manifest" 
            href="{{ mix('/assets/favicons/manifest.json') }}">
        <link rel="icon" 
            href="{{ mix('/assets/favicons/favicon.ico') }}">
        
        <link rel="stylesheet" href="{{ mix('/assets/css/main.css') }}">
    </head>
    <body class="page uk-position-relative">
        <x-scroll-up />

        <div id="offcanvas-reveal">
            <div class="uk-offcanvas-bar offcanvas-bar--padding">
                {{-- <x-drawer :close-drawer="closeDrawer"/> --}}
            </div>
        </div>

        {{-- <x-navbar :open-drawer="openDrawer" /> --}}
        <nav>
            <a href="{{ route('home') }}">ГЛАВНАЯ</a>
            <a href="{{ route('posts') }}">ПОСТЫ</a>
        </nav>

        <main class="main-content">
            {{ $slot }}
        </main>

        <x-navbar-bottom />
        <script src="{{ mix('/assets/js/main.js') }}"></script>
    </body>
</html>