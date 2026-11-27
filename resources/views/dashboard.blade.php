<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-yellow-500 text-black font-bold rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-600 text-white font-bold rounded">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-600 text-white rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($tools->isEmpty())
                <p class="text-center text-gray-400 text-xl mt-10">Пока нет доступных инструментов.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($tools as $tool)
                        <div class="bg-neutral-900 border border-neutral-800 rounded-lg overflow-hidden hover:border-yellow-500 transition duration-300 flex flex-col">
                            <div class="h-48 bg-black flex items-center justify-center text-gray-500">
                                <span class="text-5xl">🛠️</span>
                            </div>
                            
                            <form method="POST" action="{{ route('orders.store', $tool) }}" class="p-6 flex-grow flex flex-col justify-between">
                                @csrf
                                <div>
                                    <h3 class="text-2xl font-bold text-yellow-500 mb-2">{{ $tool->name }}</h3>
                                    <p class="text-gray-400 mb-4">В наличии: {{ $tool->quantity }} шт.</p>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="flex justify-between text-sm mb-2 border-b border-neutral-800 pb-2">
                                        <span class="text-gray-400">Прокат: <b class="text-white">{{ $tool->price_per_day }} ₽/день</b></span>
                                        <span class="text-gray-400">Залог: <b class="text-white">{{ $tool->deposit }} ₽</b></span>
                                    </div>

                                    <div>
                                        <label class="block text-gray-400 text-sm mb-1">Количество:</label>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $tool->quantity }}" class="w-full p-2 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none" required>
                                    </div>

                                    <div>
                                        <label class="block text-gray-400 text-sm mb-1">Получение:</label>
                                        <select name="delivery_type" class="w-full p-2 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none" required>
                                            <option value="Самовывоз">Самовывоз</option>
                                            <option value="Доставка">Доставка</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-gray-400 text-sm mb-1">Адрес (если доставка):</label>
                                        <input type="text" name="address" class="w-full p-2 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none text-sm" value="{{ auth()->user()->address ?? '' }}">
                                    </div>

                                    <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded hover:bg-yellow-400 transition mt-2">
                                        Оформить заказ
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>