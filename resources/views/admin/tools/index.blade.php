<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-black text-2xl text-yellow-500 tracking-wider uppercase">
                    {{ __('Управление инструментами') }}
                </h2>
                <a href="{{ route('admin.tools.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded font-bold hover:bg-yellow-400 transition">
                    + Добавить инструмент
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-yellow-500 text-black rounded font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-neutral-900 overflow-hidden shadow-xl sm:rounded-lg border border-neutral-800">
                <div class="p-6 text-gray-100">
                    @if($tools->isEmpty())
                        <p class="text-center text-gray-400">Список инструментов пуст. Добавьте первый!</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b-2 border-yellow-500">
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">ID</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Название</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Кол-во</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Цена/день</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Залог</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Доставка</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tools as $tool)
                                        <tr class="border-b border-neutral-800 hover:bg-neutral-800 transition">
                                            <td class="py-3 px-4">{{ $tool->id }}</td>
                                            <td class="py-3 px-4 font-bold text-white">{{ $tool->name }}</td>
                                            <td class="py-3 px-4">{{ $tool->quantity }} шт.</td>
                                            <td class="py-3 px-4 text-yellow-500">{{ $tool->price_per_day }} ₽</td>
                                            <td class="py-3 px-4">{{ $tool->deposit }} ₽</td>
                                            <td class="py-3 px-4">{{ $tool->delivery_price ? $tool->delivery_price . ' ₽' : 'Нет' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>