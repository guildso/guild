<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo"></x-slot>

        <a href="/" class="inline-block pb-5 text-xl font-black text-gray-700 dark:text-gray-100 uppercase">Signup for an account</a>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center flex-col justify-center mt-4">

                <x-jet-button class="w-full mb-4">
                    {{ __('Register') }}
                </x-jet-button>

                 <a class="text-sm text-gray-600 dark:text-gray-500 dark:hover:text-gray-400 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered? Login here.') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
