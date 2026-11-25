<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавить инструмент') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-yellow-500">
                <form method="POST" action="{{ route('admin.tools.store') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-yellow-500 font-bold mb-2">Название</label>
                        <input type="text" name="name" class="w-full p-2 bg-gray-700 text-white rounded border border-gray-600 focus:border-yellow-500 outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-yellow-500 font-bold mb-2">Количество на складе</label>
                        <input type="number" name="quantity" class="w-full p-2 bg-gray-700 text-white rounded border border-gray-600 focus:border-yellow-500 outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-yellow-500 font-bold mb-2">Стоимость проката (за сутки)</label>
                        <input type="number" step="0.01" name="price_per_day" class="w-full p-2 bg-gray-700 text-white rounded border border-gray-600 focus:border-yellow-500 outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-yellow-500 font-bold mb-2">Залоговая стоимость</label>
                        <input type="number" step="0.01" name="deposit" class="w-full p-2 bg-gray-700 text-white rounded border border-gray-600 focus:border-yellow-500 outline-none" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-yellow-500 font-bold mb-2">Стоимость доставки (оставьте пустым, если нет)</label>
                        <input type="number" step="0.01" name="delivery_price" class="w-full p-2 bg-gray-700 text-white rounded border border-gray-600 focus:border-yellow-500 outline-none">
                    </div>

                    <button type="submit" class="bg-yellow-500 text-black font-bold py-2 px-6 rounded hover:bg-yellow-400 transition">
                        Сохранить
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>