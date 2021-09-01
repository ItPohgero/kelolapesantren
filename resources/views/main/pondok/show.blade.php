<x-main-layout>
    <x-search></x-search>
    <main class="bg-white rounded-xl shadow p-5">
        <p class="font-bold">Profile Pondok Pesantren</p>
        <x-alert></x-alert>
        <form method="POST" action="{{ route('pondok.update', $pondok->id) }}" autocomplete="off">
            @csrf
            @method('patch')
            <div class="my-2">
                <x-jet-label for="nama" value="{{ __('Nama') }}" />
                <x-jet-input id="nama" class="block my-1 w-full" type="text" name="nama" :value="old('nama') ?? $pondok->nama" required autofocus />
                <p class="text-xs">Maksimal 25 karakter | Gunakan nama langsung tanpa memakai Pondok Pesantren. Contoh : Darun Naja</p>
                <x-error for="nama"></x-error>
            </div>
            <div class="my-2">
                <x-jet-label for="pengasuh" value="{{ __('Pengasuh') }}" />
                <x-jet-input id="pengasuh" class="block my-1 w-full" type="text" name="pengasuh" :value="old('pengasuh') ?? $pondok->pengasuh" required autofocus />
                <x-error for="pengasuh"></x-error>
            </div>
            <div class="my-2">
                <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                <x-jet-input id="alamat" class="block my-1 w-full" type="text" name="alamat" :value="old('alamat') ?? $pondok->alamat" required autofocus />
                <x-error for="alamat"></x-error>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </main>
</x-main-layout>
