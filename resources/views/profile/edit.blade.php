<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-yellow-500 tracking-wider uppercase leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Форма с личными данными -->
            <div class="p-4 sm:p-8 bg-gray-950 shadow-xl sm:rounded-lg border border-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Смена пароля -->
            <div class="p-4 sm:p-8 bg-gray-950 shadow-xl sm:rounded-lg border border-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Удаление аккаунта -->
            <div class="p-4 sm:p-8 bg-gray-950 shadow-xl sm:rounded-lg border border-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Блок Мои заказы -->
            <div class="p-4 sm:p-8 bg-gray-950 shadow-xl sm:rounded-lg border border-yellow-500 mt-8">
                <h2 class="text-xl font-bold text-yellow-500 mb-6">
                    {{ __('Мои заказы') }}
                </h2>
                
                @if(auth()->user()->orders->isEmpty())
                    <p class="text-gray-400">У вас пока нет активных или завершенных заказов.</p>
                @else
                    <div class="space-y-4">
                        @foreach(auth()->user()->orders as $order)
                            <div class="border border-gray-800 p-4 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center bg-black">
                                <div class="mb-4 md:mb-0">
                                    <p class="font-bold text-lg text-white">{{ $order->tool->name }}</p>
                                    <p class="text-sm text-gray-400 mt-1">
                                        Способ получения: <span class="text-white">{{ $order->delivery_type }}</span>
                                        @if($order->address)
                                            <br>Адрес: {{ $order->address }}
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <span class="px-4 py-2 rounded text-sm font-bold 
                                        @if($order->status == 'Подготавливается') bg-yellow-500 text-black 
                                        @elseif($order->status == 'В ожидании') bg-gray-600 text-white 
                                        @elseif($order->status == 'Доставляется') bg-blue-600 text-white 
                                        @elseif($order->status == 'Доставлен') bg-green-600 text-white 
                                        @elseif($order->status == 'Получен') bg-emerald-600 text-white @endif">
                                        {{ $order->status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>