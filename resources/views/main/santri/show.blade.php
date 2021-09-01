<x-main-layout>
    <x-search></x-search>
    <div class="mt-16 w-full rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-lg bg-white dark:bg-gray-800 opacity-75">
        <div class="p-4 md:p-12 text-center lg:text-left">
            <!-- Image for mobile view-->
            <div class="flex justify-center -mt-16">
                {!! QrCode::eyeColor(2, 200, 25, 75, 0, 0, 0)
                ->size(150)
                ->style('round')
                ->generate(route('barcode.read', ['code' => $santri->code, 'hash' => _HASH])); !!}
            </div>
            <h1 class="text-xl font-bold lg:pt-0 mt-2 uppercase">{{ $santri->nama }}</h1>
            <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 border-dashed opacity-25"></div>
            <p class="pt-4 text-base dark:text-white font-bold flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                </svg> {{ $santri->code }}</p>
            <p class="pt-2 text-gray-600 `dark:text-white lg:text-sm flex items-center justify-center lg:justify-start capitalize">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 fill-current text-green-700 pr-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                {{ $santri->alamat }}
            </p>

            <div class="pt-6 pb-8 flex justify-center space-x-2">
                <a href="{{ route('tabungan.show', $santri->code) }}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                    Rekening
                </a>
            </div>
            <p class="pt-3 text-sm">Totally optional short description about yourself, what you do and so on.</p>
        </div>

    </div>
</x-main-layout>
