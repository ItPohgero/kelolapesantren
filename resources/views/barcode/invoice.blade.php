<x-guest-layout>
    <div class="min-h-screen bg-gray-400 flex justify-center items-center px-2">
        <div class="absolute w-60 h-60 rounded-xl bg-gray-300 top-5 left-16 z-0 transform rotate-45 hidden md:block"></div>
        <div class="absolute w-48 h-48 rounded-xl bg-gray-300 bottom-6 right-10 transform rotate-12 hidden md:block"></div>
        <div class="p-6 w-max bg-white rounded-2xl shadow-xl z-20">
            <!-- component -->
            <div class="flex justify-between items-center border-b border-dashed pb-2">
                <div>
                    <p class="font-bold">an. <span class="capitalize">{{ $tabungan->santri->nama }}</span></p>
                    <p class="text-yellow-500 text-xs">code {{ $tabungan->santri->code }}</p>
                </div>

            </div>
            <div class="mt-2 text-sm">
                <p class="text-center my-2 font-bold text-green-500 bg-gray-100 py-2">BERHASIL</p>
                <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                    <span>No. Invoice</span>
                    <span>{{ $tabungan->invoice }}</span>
                </div>
                <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                    <span>Desc</span>
                    <span>{{ $tabungan->desc }}</span>
                </div>
                <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                    <span>Total</span>
                    <span class="text-lg font-bold"><span class="text-xs">Rp. </span>{{ number_format($tabungan->nominal )}}</span>
                </div>
                <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                    <span>Tanggal</span>
                    <span>{{ $tabungan->created_at }}</span>
                </div>
                <div class="text-center mt-4">
                    Apakah anda ingin transaksi lagi?, Invoice berikut telah terdaftar dan masuk dalam akun terkait.
                </div>
                <div class="mt-3 flex justify-center space-x-4">
                    @if ($tabungan->toko_id == null)
                    <a target="_blank" href="{{ route('barcode.tabungan_pdf', $tabungan->invoice) }}" class="bg-red-600 hover:bg-red-800 py-2 px-4 rounded text-white text-sm">PDF</a>
                    @else
                    <a target="_blank" href="{{ route('barcode.toko_pdf', $tabungan->invoice) }}" class="bg-red-600 hover:bg-red-800 py-2 px-4 rounded text-white text-sm">PDF</a>
                    @endif
                    <a href="{{ route('barcode.read', ['code' => $tabungan->santri->code, 'hash' => _HASH]) }}" class="bg-gray-600 hover:bg-gray-800 py-2 px-4 rounded text-white text-sm">IYA</a>
                    <a href="/logout" class="bg-green-600 hover:bg-green-800 py-2 px-4 rounded text-white text-sm">TIDAK!</a>
                </div>
            </div>
            <!-- component -->
        </div>
        <div class="w-40 h-40 absolute bg-gray-300 rounded-full top-0 right-12 hidden md:block"></div>
        <div class="w-20 h-40 absolute bg-gray-300 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block"></div>
    </div>
</x-guest-layout>
