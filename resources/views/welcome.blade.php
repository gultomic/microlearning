<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pasker ID - Microlearning</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        @include('components.header')

        <div class="relative min-h-screen bg-center">
            <div class="p-2 mx-auto max-w-7xl lg:p-8">
                <div class="flex justify-center">
                    <x-application-logo class="w-20 h-20 text-indigo-700 fill-current" />
                </div>

                <p class="inline-flex justify-center w-full mx-auto text-4xl font-bold tracking-wider md:text-8xl">
                    <span>MICRO</span>
                    <span class="text-sky-600">LEARNING</span>
                </p>

                <div class="justify-center p-6 mx-auto font-bold lg:flex lg:divide-x-4 divide-stone-300 lg:text-2xl">
                    <div class="px-6 text-center">Literasi Dunia Kerja</div>
                    <div class="px-6 text-center">Literasi Pengembangan Diri</div>
                    <div class="px-6 text-center">Literasi Karir</div>
                </div>

                <livewire:landing />
            </div>

            @include('components.footer')
        </div>

        @livewireScripts
    </body>
</html>
