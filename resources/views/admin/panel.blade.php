<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Панель администратора') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Карточка: Каталог инструментов -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 hover:border-yellow-500 transition">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Каталог инструментов</h4>
                    <p class="text-gray-400 mb-6 text-sm">Управление каталогом: добавление, редактирование, удаление.</p>
                    <a href="{{ route('admin.tools.index') }}" class="inline-block px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-400 transition">
                        Управлять
                    </a>
                </div>

                <!-- Карточка: Заказы клиентов -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 hover:border-yellow-500 transition">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Заказы клиентов</h4>
                    <p class="text-gray-400 mb-6 text-sm">Просмотр текущих аренд и истории.</p>
                    <a href="{{ route('admin.orders.index') }}" class="inline-block px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-400 transition">
                        Смотреть заказы
                    </a>
                </div>

                <!-- Карточка: Пользователи (Опционально) -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 hover:border-yellow-500 transition">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Пользователи</h4>
                    <p class="text-gray-400 mb-6 text-sm">Список зарегистрированных клиентов.</p>
                    <button class="inline-block px-4 py-2 bg-gray-600 text-white font-bold rounded cursor-not-allowed">В разработке</button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>