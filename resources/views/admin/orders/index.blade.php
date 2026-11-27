<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-yellow-500 tracking-wider uppercase leading-tight">
            {{ __('Управление заказами') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-yellow-500 text-black rounded font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-950 overflow-hidden shadow-xl sm:rounded-lg border border-gray-800">
                <div class="p-6 text-gray-100">
                    @if($orders->isEmpty())
                        <p class="text-center text-gray-400">Заказов пока нет.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b-2 border-yellow-500">
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">ID</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Клиент</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Инструмент</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Получение</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Статус</th>
                                        <th class="py-3 px-4 text-yellow-500 font-bold uppercase text-sm">Изменить</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr class="border-b border-gray-800 hover:bg-gray-900 transition">
                                            <td class="py-3 px-4">{{ $order->id }}</td>
                                            <td class="py-3 px-4">
                                                <div class="font-bold text-white">{{ $order->user->login ?? $order->user->name }}</div>
                                                <div class="text-sm text-gray-400">{{ $order->user->phone }}</div>
                                            </td>
                                            <td class="py-3 px-4 text-white">
                                                {{ $order->tool->name }} <br>
                                                <span class="text-yellow-500 font-bold text-sm">({{ $order->quantity }} шт.)</span>
                                            </td>
                                            <td class="py-3 px-4 text-gray-300">
                                                {{ $order->delivery_type }}
                                                @if($order->address)
                                                    <div class="text-sm text-gray-500">{{ $order->address }}</div>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 rounded text-xs font-bold 
                                                    @if($order->status == 'Подготавливается') bg-yellow-500 text-black 
                                                    @elseif($order->status == 'В ожидании') bg-gray-600 text-white 
                                                    @elseif($order->status == 'Доставляется') bg-blue-600 text-white 
                                                    @elseif($order->status == 'Доставлен') bg-green-600 text-white 
                                                    @elseif($order->status == 'Получен') bg-emerald-600 text-white @endif">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex items-center gap-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="bg-black text-white text-sm rounded border border-gray-700 p-1 focus:border-yellow-500 outline-none">
                                                        <option value="Подготавливается" {{ $order->status == 'Подготавливается' ? 'selected' : '' }}>Подготавливается</option>
                                                        <option value="В ожидании" {{ $order->status == 'В ожидании' ? 'selected' : '' }}>В ожидании</option>
                                                        <option value="Доставляется" {{ $order->status == 'Доставляется' ? 'selected' : '' }}>Доставляется</option>
                                                        <option value="Доставлен" {{ $order->status == 'Доставлен' ? 'selected' : '' }}>Доставлен</option>
                                                        <option value="Получен" {{ $order->status == 'Получен' ? 'selected' : '' }}>Получен</option>
                                                    </select>
                                                    <button type="submit" class="bg-yellow-500 text-black px-3 py-1 rounded font-bold hover:bg-yellow-400 text-sm">
                                                        ОК
                                                    </button>
                                                </form>
                                            </td>
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