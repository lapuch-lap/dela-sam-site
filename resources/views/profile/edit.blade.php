        <!-- Мои заказы -->
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Мои заказы') }}
            </h2>
            @if(auth()->user()->orders->isEmpty())
                <p class="text-gray-500">У вас пока нет заказов.</p>
            @else
                <div class="space-y-4">
                    @foreach(auth()->user()->orders as $order)
                        <div class="border border-gray-200 dark:border-gray-700 p-4 rounded-lg">
                            <p><b>Инструмент:</b> {{ $order->tool->name }}</p>
                            <p><b>Тип получения:</b> {{ $order->delivery_type }}</p>
                            <p><b>Статус:</b> <span class="font-bold text-yellow-500">{{ $order->status }}</span></p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>