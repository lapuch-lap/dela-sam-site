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
    <body class="font-sans text-gray-900 antialiased bg-black">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black">
            
            <!-- Логотип -->
            <div>
                <a href="/" class="flex flex-col items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Делай Сам" class="h-20 w-auto">
                    <span class="text-4xl font-black text-yellow-500 tracking-wider">
                        ДЕЛАЙ САМ
                    </span>
                </a>
            </div>

            <!-- Форма (вход/регистрация) -->
            <div class="w-full sm:max-w-md mt-8 px-6 py-8 bg-neutral-900 shadow-2xl overflow-hidden sm:rounded-lg border border-yellow-500">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-neutral-500 text-sm">
                &copy; {{ date('Y') }} Делай Сам
            </div>
        </div>
    </body>
</html>