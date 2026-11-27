<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Делай Сам') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black text-gray-100">
        <div class="min-h-screen bg-black flex flex-col">
            @include('layouts.navigation')

            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <footer class="bg-black border-t border-neutral-900 py-6">
                <div class="max-w-7xl mx-auto px-4 text-center text-neutral-500 text-sm">
                    &copy; {{ date('Y') }} Магазин инструментов "Делай Сам". Все права защищены.
                </div>
            </footer>
        </div>
    </body>
</html>