<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Делай Сам - Аренда инструментов</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans antialiased">
    
    <!-- Шапка сайта -->
    <nav class="bg-black border-b-4 border-yellow-500 p-4 flex justify-between items-center">
        <h1 class="text-3xl font-black text-yellow-500 tracking-wider">ДЕЛАЙ САМ</h1>
        <div class="space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-yellow-500 font-bold hover:text-yellow-400">Личный кабинет</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-yellow-500">Войти</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-yellow-500 text-black px-4 py-2 rounded font-bold hover:bg-yellow-400 transition">Регистрация</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Главный экран -->
    <div class="py-12 px-4 max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold mb-8 text-center">Каталог инструментов</h2>

        @if($tools->isEmpty())
            <p class="text-center text-gray-400 text-xl">Пока нет доступных инструментов.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($tools as $tool)
                    <div class="bg-black border border-gray-700 rounded-lg overflow-hidden hover:border-yellow-500 transition duration-300 flex flex-col">
                        <div class="h-48 bg-gray-800 flex items-center justify-center text-gray-500">
                            <!-- Тут будет фото, пока заглушка -->
                            <span class="text-5xl">🛠️</span>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-yellow-500 mb-2">{{ $tool->name }}</h3>
                                <p class="text-gray-400 mb-4">В наличии: {{ $tool->quantity }} шт.</p>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-4 text-sm">
                                    <span>Прокат: <b class="text-white">{{ $tool->price_per_day }} ₽/день</b></span>
                                    <span>Залог: <b class="text-white">{{ $tool->deposit }} ₽</b></span>
                                </div>
                                <button class="w-full bg-yellow-500 text-black font-bold py-3 rounded hover:bg-yellow-400 transition">
                                    Заказать
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>