<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Управление инструментами') }}
            </h2>
            <a href="{{ route('admin.tools.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded font-bold hover:bg-yellow-400 transition">
                + Добавить инструмент
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-600 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <div class="p-6 text-gray-100">
                    @if($tools->isEmpty())
                        <p class="text-center text-gray-400">Список инструментов пуст. Добавьте первый!</p>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-600">
                                    <th class="py-3 px-4 text-yellow-500">ID</th>
                                    <th class="py-3 px-4 text-yellow-500">Название</th>
                                    <th class="py-3 px-4 text-yellow-500">Кол-во</th>
                                    <th class="py-3 px-4 text-yellow-500">Цена/день</th>
                                    <th class="py-3 px-4 text-yellow-500">Залог</th>
                                    <th class="py-3 px-4 text-yellow-500">Доставка</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tools as $tool)
                                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                        <td class="py-3 px-4">{{ $tool->id }}</td>
                                        <td class="py-3 px-4 font-bold">{{ $tool->name }}</td>
                                        <td class="py-3 px-4">{{ $tool->quantity }} шт.</td>
                                        <td class="py-3 px-4">{{ $tool->price_per_day }} ₽</td>
                                        <td class="py-3 px-4">{{ $tool->deposit }} ₽</td>
                                        <td class="py-3 px-4">{{ $tool->delivery_price ? $tool->delivery_price . ' ₽' : 'Нет' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>