<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gray-100 bg-center sm:flex">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="p-2 mx-auto max-w-7xl lg:p-8">
                <div class="flex justify-center">
                    <x-application-logo class="w-20 h-20 text-indigo-700 fill-current" />
                </div>

                <p class="text-xl font-black text-center md:text-5xl">MICROLEARNING</p>

                <livewire:landing />
            </div>
        </div>
        @livewireScripts
    </body>
</html>
