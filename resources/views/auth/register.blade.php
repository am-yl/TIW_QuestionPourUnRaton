<x-guest-layout>

    <div class="min-h-full h-screen flex flex-col items-center justify-center pt-6 pb-12 px-4 sm:px-6 lg:px-8">
        <a href="/" class="block">
            <img class="logo" src="{{asset('/img/raccoon.png')}}" alt="logo">
        </a>
        <h1 class="mt-4 text-center text-3xl font-extrabold">QUESTIONS POUR UN RATON</h1>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST"  class="mt-6 space-y-6 block formWelcome" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Prénom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Surname -->
            <div class="mt-4">
                <x-label for="surname" :value="__('Nom')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Adresse Mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà enregistré ?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('S\'enregistrer') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
