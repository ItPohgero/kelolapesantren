<p class="text-center">
    Update password anda, gunakan perpaduan antara huruf, angka dan karakter untuk menghasilkan password strong.
</p>

<div class="mx-5 mt-5">
    <form method="POST" action="{{ route('santri.update_password') }}" autocomplete="off">
        @csrf
        @method('patch')
        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-error for="password"></x-error>
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>
        <div class="flex items-center justify-end mt-4">
          <x-jet-button class="ml-4">
                {{ __('Update') }}
            </x-jet-button>
        </div>
    </form>
</div>