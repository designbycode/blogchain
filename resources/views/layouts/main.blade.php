<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth h-full ">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name')   }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<x-banner />
<x-app::marquee></x-app::marquee>
<x-app::navigation></x-app::navigation>

<!-- Page Content -->
<main id="main">
    {{ $slot }}
</main>

<x-app::footer />
@stack('modals')

@livewireScripts
</body>
</html>
