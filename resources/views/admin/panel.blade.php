<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Карточка: Каталог инструментов -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 hover:border-yellow-500 transition shadow-lg">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Каталог инструментов</h4>
                    <p class="text-gray-400 mb-6 text-sm">Управление каталогом: добавление, редактирование, удаление.</p>
                    <a href="{{ route('admin.tools.index') }}" class="inline-block px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-400 transition">
                        Управлять
                    </a>
                </div>

                <!-- Карточка: Заказы клиентов -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 hover:border-yellow-500 transition shadow-lg">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Заказы клиентов</h4>
                    <p class="text-gray-400 mb-6 text-sm">Просмотр текущих аренд и истории.</p>
                    <a href="{{ route('admin.orders.index') }}" class="inline-block px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-400 transition">
                        Смотреть заказы
                    </a>
                </div>

                <!-- Карточка: О компании -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-lg p-6 hover:border-yellow-500 transition shadow-lg">
                    <h4 class="text-xl font-bold text-yellow-500 mb-4">Страница "О компании"</h4>
                    <p class="text-gray-400 mb-6 text-sm">Редактирование текста, который видят пользователи.</p>
                    <!-- Вот эта ссылка должна быть правильной -->
                    <a href="{{ route('admin.about.edit') }}" class="inline-block px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-400 transition">
                        Редактировать
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout> 