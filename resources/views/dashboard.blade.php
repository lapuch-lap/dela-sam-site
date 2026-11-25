<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Каталог инструментов "Делай Сам"') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if($tools->isEmpty())
                <p class="text-center text-gray-400 text-xl">Пока нет доступных инструментов.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($tools as $tool)
                        <div class="bg-black border border-gray-700 rounded-lg overflow-hidden hover:border-yellow-500 transition duration-300 flex flex-col">
                            <div class="h-48 bg-gray-800 flex items-center justify-center text-gray-500">
                                <span class="text-5xl">🛠️</span>
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-2xl font-bold text-yellow-500 mb-2">{{ $tool->name }}</h3>
                                    <p class="text-gray-400 mb-4">В наличии: {{ $tool->quantity }} шт.</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-4 text-sm">
                                        <span class="text-gray-300">Прокат: <b class="text-white">{{ $tool->price_per_day }} ₽/день</b></span>
                                        <span class="text-gray-300">Залог: <b class="text-white">{{ $tool->deposit }} ₽</b></span>
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
    </div>
</x-app-layout>