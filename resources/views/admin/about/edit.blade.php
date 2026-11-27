<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Заголовок страницы -->
            <div class="mb-6">
                <h2 class="font-black text-2xl text-yellow-500 tracking-wider uppercase">
                    {{ __('Редактирование страницы "О компании"') }}
                </h2>
            </div>

            <!-- Блок с формой -->
            <div class="bg-neutral-900 p-8 rounded-lg shadow-xl border border-neutral-800">
                
                <!-- Уведомление об успехе -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-yellow-500 text-black font-bold rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Форма отправки данных -->
                <form method="POST" action="{{ route('admin.about.update') }}">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="about_text" class="block text-yellow-500 font-bold mb-2 uppercase tracking-wide">
                            Текст о компании
                        </label>
                        <textarea 
                            id="about_text" 
                            name="about_text" 
                            rows="12" 
                            class="w-full p-4 bg-black text-gray-200 rounded border border-neutral-700 focus:border-yellow-500 focus:ring focus:ring-yellow-500/20 outline-none transition duration-200"
                            placeholder="Введите информацию о вашей компании..."
                            required
                        >{{ $aboutText }}</textarea>
                        
                        @error('about_text')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Кнопка сохранения (использует компонент primary-button, который мы стилизовали под желтый) -->
                        <x-primary-button>
                            {{ __('Сохранить изменения') }}
                        </x-primary-button>

                        <!-- Кнопка возврата в админку -->
                        <a href="{{ route('admin.panel') }}" class="inline-flex items-center px-4 py-2 bg-transparent border border-neutral-600 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Отмена
                        </a>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>