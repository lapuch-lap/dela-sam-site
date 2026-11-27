<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h2 class="font-black text-2xl text-yellow-500 tracking-wider uppercase">
                    {{ __('Добавить инструмент') }}
                </h2>
            </div>

            <div class="bg-neutral-900 p-8 rounded-lg shadow-xl border border-neutral-800">
                <form method="POST" action="{{ route('admin.tools.store') }}">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-yellow-500 font-bold mb-2">Название</label>
                        <input type="text" name="name" class="w-full p-3 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none transition" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-yellow-500 font-bold mb-2">Количество на складе</label>
                        <input type="number" name="quantity" class="w-full p-3 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none transition" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-yellow-500 font-bold mb-2">Стоимость проката (за сутки)</label>
                        <input type="number" step="0.01" name="price_per_day" class="w-full p-3 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none transition" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-yellow-500 font-bold mb-2">Залоговая стоимость</label>
                        <input type="number" step="0.01" name="deposit" class="w-full p-3 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none transition" required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-yellow-500 font-bold mb-2">Стоимость доставки (оставьте пустым, если нет)</label>
                        <input type="number" step="0.01" name="delivery_price" class="w-full p-3 bg-black text-white rounded border border-neutral-700 focus:border-yellow-500 outline-none transition">
                    </div>

                    <button type="submit" class="bg-yellow-500 text-black font-bold py-3 px-8 rounded hover:bg-yellow-400 transition">
                        Сохранить
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>