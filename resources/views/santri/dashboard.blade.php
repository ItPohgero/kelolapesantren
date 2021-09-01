<x-santri-layout>
    <main class="bg-gradient-to-t from-blue-400 to-blue-900 pb-5 rounded-b">
        <section class="bg-gradient-to-b from-gray-300 to-gray-200 w-full py-2 rounded-b-full shadow">
            <div class="flex justify-center items-center text-gray-800 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="ml-2">
                    <p class="font-bold">{{ santri()->nama }}</p>
                    <p class="text-xs">{{ santri()->code }}</p>
                </div>
            </div>
        </section>
        <div class="mx-10 text-center my-4">
            <p class="text-yellow-300 font-bold text-lg uppercase">{{ santri()->user->pondoks->nama ?? env('APP_NAME') }}</p>
            <p class="text-xs text-white">{{ santri()->user->pondoks->alamat ?? 'lembaga belum disetting' }}</p>
        </div>
        <section class="flex justify-center items-center mx-3">
            <div class="p-2 bg-blue-400 rounded-lg shadow-lg">
                <div class="bg-gray-50 p-3 rounded-xl shadow-lg">
                    <div>
                        {!! QrCode::eyeColor(2, 200, 25, 75, 0, 0, 0)
                        ->size(150)
                        ->style('round')
                        ->generate(route('barcode.read', ['code' => santri()->code, 'hash' => _HASH])); !!}
                    </div>
                </div>
            </div>
        </section>
        <section class="flex justify-center">
            <div class="mt-3 bg-gray-50 rounded-xl py-4 px-6 shadow-lg h-16 w-72 flex justify-between items-center">
                <span class="text-sm font-bold">Tabungan</span>
                <span class="text-xl font-bold"><span class="text-xs">Rp. </span>{{ number_format($plus - $minus) }}</span>
            </div>
        </section>
        <div class="mx-10 text-center my-4">
           <p class="text-white text-xs">Diatas adalah sisa saldo tabungan, kalkulasi dari transaksi setor tunai, tarik tunai dan pembelian pada toko pesantren </p>
        </div>
    </main>
    <main class="flex justify-center bg-gray-100 m-auto p-auto py-3">
        <div class="flex overflow-x-scroll hide-scroll-bar">
            <div class="flex flex-nowrap">
                <div class="inline-block px-3">
                    <div class="w-64 h-full max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                        Jadilah seperti pohon kayu yang lebat buahnya, tumbuh ditepi jalan. Dilempar buahnya dengan batu, tetapi tetap membalas dengan buah
                    </div>
                </div>
                <div class="inline-block px-3">
                    <div class="w-64 h-full max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                        Mahkota seseorang adalah akalnya. Derajat seseorang adalah agamanya. Sedangkan kehormatan seseorangan adalah budi pekertinya.
                    </div>
                </div>
                <div class="inline-block px-3">
                    <div class="w-64 h-full max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                       Aku tidak pernah menyesali diamku. Tetapi aku berkali-kali menyesali bicaraku.
                    </div>
                </div>
                <div class="inline-block px-3">
                    <div class="w-64 h-full max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                        Terkadang, orang dengan masa lalu yang paling kelam akan menciptakan masa depan yang paling cerah.
                    </div>
                </div>
            </div>
        </div>

        <style>
            .hide-scroll-bar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }
        </style>
    </main>
    <main class="text-center mt-5">
        <p class="text-gray-800 font-bold">Application Version 1.1</p>
        <p class="text-xs">&copy; {{ date('Y') }} ITP Developer</p>
    </main>
</x-santri-layout>
