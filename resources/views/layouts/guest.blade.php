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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-12 sm:pt-0 ">
        {{-- header --}}
        <section class=" mb-12">
            <div>
                <h1 class=" text-2xl font-Fjualla font-bold text-green-900">S<span
                        class=" text-4xl font-bold font-roboto text-red-900">K</span>ilL <span
                        class=" text-4xl font-bold font-roboto text-red-900">T</span>ooL</h1>
            </div>
            <div class="flex justify-center mb-5">
                <h3 class="font-roboto font-bold text-blue-900 text-xs uppercase">Horizon Campus</h3>
            </div>

        </section>
        {{-- end of header --}}

        <div
            class=" rounded-3xl w-[400px] sm:max-w-md mt-6 px-6 py-4 bg-white border-4 border-orange-400 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
