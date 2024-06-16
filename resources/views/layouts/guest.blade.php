<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gradient-to-t from-blue-500 to-slate-300">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-12 sm:pt-0">
        <x-app-name />

        <div
            {{ $attributes->merge(['class' => 'rounded-3xl tablet:w-[400px] mt-6 px-6 py-4 bg-white border-4 border-red-800 shadow-md overflow-hidden sm:rounded-lg']) }}>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
