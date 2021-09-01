<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if (session('code_santri'))
        <a href="{{ route('santri.dashboard') }}">Dashboard</a>
        @endif
        <x-alert></x-alert>
        <form method="POST" action="{{ route('santri.chek.login') }}">
            @csrf

            <div>
                <x-jet-label for="code" value="{{ __('Code') }}" />
                <x-jet-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus />
                @if (session('code'))
                <p class="text-xs text-red-600 mt-2">{{ session('code') }}</p>
                @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                @if (session('password'))
                <p class="text-xs text-red-600 mt-2">{{ session('password') }}</p>
                @endif
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
