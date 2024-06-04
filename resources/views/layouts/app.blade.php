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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if (session('success'))
                    <div class="flex justify-center pt-1.5 text-sm place-items-end">
                        <span class="px-2 font-light tracking-tighter bg-blue-600 border-blue-600 rounded-l-md text-sky-100">Success</span>
                        <span class="px-2 text-xs italic border-b border-blue-600">{{ session('success') }}</span>
                    </div>
                @elseif (session('error'))
                    <div class="flex justify-center pt-1.5 text-sm place-items-end">
                        <span class="px-2 font-light tracking-tighter bg-red-600 border-red-600 rounded-l-md text-sky-100">Success</span>
                        <span class="px-2 text-xs italic border-b border-red-600">{{ session('error') }}</span>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
