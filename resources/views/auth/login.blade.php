<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Логин -->
        <div>
            <x-input-label for="login" :value="__('Логин')" class="text-yellow-500 font-bold" />
            <x-text-input id="login" class="block mt-1 w-full bg-black text-white border-gray-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2 text-red-500" />
        </div>

        <!-- Пароль -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" class="text-yellow-500 font-bold" />
            <x-text-input id="password" class="block mt-1 w-full bg-black text-white border-gray-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Запомнить меня -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-black border-gray-700 text-yellow-500 shadow-sm focus:ring-yellow-500" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Запомнить меня') }}</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-400 hover:text-yellow-500 rounded-md focus:outline-none transition" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-transparent border border-gray-600 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-900 hover:text-yellow-500 transition">
                    {{ __('Регистрация') }}
                </a>
                <x-primary-button>
                    {{ __('Авторизоваться') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>