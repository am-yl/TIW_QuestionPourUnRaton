<x-guest-layout>

    <div class="min-h-full flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <a href="/" class="block">
            <img class="logo" src="{{asset('/img/raccoon.png')}}" alt="logo">
        </a>
        <h1 class="mt-6 text-center text-3xl font-extrabold">QUESTIONS POUR UN RATON</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-2" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-2" :errors="$errors" />

        <form method="POST" class="mt-8 space-y-6 block formWelcome" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Adresse Mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <x-button class="ml-3 submit">
                    {{ __('Connexion') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
