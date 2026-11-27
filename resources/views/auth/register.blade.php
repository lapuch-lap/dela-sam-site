<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Логин -->
        <div>
            <x-input-label for="login" :value="__('Логин')" class="text-yellow-500 font-bold" />
            <x-text-input id="login" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2 text-red-500" />
        </div>

        <!-- ФИО -->
        <div class="mt-4">
            <x-input-label for="full_name" :value="__('ФИО')" class="text-yellow-500 font-bold" />
            <x-text-input id="full_name" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="text" name="full_name" :value="old('full_name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('full_name')" class="mt-2 text-red-500" />
        </div>

        <!-- Телефон -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Телефон')" class="text-yellow-500 font-bold" />
            <x-text-input id="phone" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="tel" name="phone" :value="old('phone')" autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-500" />
        </div>

        <!-- Адрес -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Адрес')" class="text-yellow-500 font-bold" />
            <x-text-input id="address" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="text" name="address" :value="old('address')" autocomplete="street-address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2 text-red-500" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Электронная почта')" class="text-yellow-500 font-bold" />
            <x-text-input id="email" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Пароль -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" class="text-yellow-500 font-bold" />
            <x-text-input id="password" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Подтверждение пароля -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')" class="text-yellow-500 font-bold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-black text-white border-neutral-700 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-400 hover:text-yellow-500 rounded-md focus:outline-none transition me-4" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>

            <x-primary-button>
                {{ __('Регистрация') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>