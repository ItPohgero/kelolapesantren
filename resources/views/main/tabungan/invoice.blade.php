<x-main-layout>
    <x-search></x-search>
    <div class="mx-1 p-5 md:mx-72 bg-white rounded-xl shadow">
        <x-alert></x-alert>
        <div class="flex justify-between items-center border-b border-dashed pb-2">
            <div>
                <p class="font-bold">an. <span class="capitalize">{{ $santri->nama }}</span></p>
                <p class="text-yellow-500 text-xs">code {{ $santri->code }}</p>
            </div>
            <div class="bg-green-100 py-1 px-3 rounded">
                <span class="text-xs">Saldo </span>
                <span class="font-bold">Rp. {{ number_format($plus - $minus) }}</span>
            </div>
        </div>
        <div class="mt-2 text-sm">
            <p class="text-center my-2 font-bold">INVOICE</p>
            <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                <span>Invoice</span>
                <span>{{ $tabungan->invoice }}</span>
            </div>
            <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                <span>Desc</span>
                <span>{{ $tabungan->desc }}</span>
            </div>
            <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                <span>Status</span>
                <span>{{ ($tabungan->status == 1 ) ? 'Setor Tunai' : 'Tarik Tunai' }}</span>
            </div>
            <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                <span>Nominal</span>
                <span class="text-lg font-bold"><span class="text-xs">Rp. </span>{{ number_format($tabungan->nominal )}}</span>
            </div>
            <div class="grid grid-cols-2 border-b py-1 border-dashed border-yellow-200 items-center">
                <span>Tanggal</span>
                <span>{{ $tabungan->created_at }}</span>
            </div>
            <div class="mt-3">
                Invoice ini adalah tanda bukti setor dan tarik tunai, simpan jika anda membutuhkan.
            </div>
            <div class="mt-6 flex justify-center">
                <a href="{{ route('tabungan.download', $tabungan->invoice) }}" target="_blank" class="bg-red-600 hover:bg-red-800 py-2 px-4 rounded text-white text-sm">Download PDF</a>
            </div>
        </div>
    </div>
</x-main-layout>
