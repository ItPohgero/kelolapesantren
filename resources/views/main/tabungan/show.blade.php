<x-main-layout>
    <x-search></x-search>
    <div class="flex justify-between items-center py-3 mb-2 bg-white px-5">
        <div>
            <p class="font-bold">an. <span class="capitalize">{{ $santri->nama }}</span></p>
            <p class="text-yellow-500 text-xs">code {{ $santri->code }}</p>
        </div>
        <div class="bg-green-100 py-1 px-3 rounded">
            <span class="text-xs">Saldo </span>
            <span class="font-bold">Rp. {{ number_format($plus - $minus) }}</span>
        </div>
    </div>
    <x-div-table>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Invoice</th>
                    <th class="px-4 py-3">Desc</th>
                    <th class="px-4 py-3">Nominal</th>
                    <th class="px-4 py-3">Filter</th>
                    <th class="px-4 py-3">Print</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($tabungan as $item)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <a href="#" class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 w-full h-full rounded-full {{ ($item->status == 0) ?'text-red-500': 'text-green-500'  }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $item->invoice }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ status($item->status) }} a.n {{ $item->santri->nama }}
                                </p>
                            </div>
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->desc }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight  {{ ($item->status == 1) ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:bg-red-700 dark:bg-red-700 dark:text-red-100' }}  rounded-full">
                            {{ ($item->status == 0 ) ? '- ':'' }} Rp. {{ number_format($item->nominal) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">

                        @if (!$item->toko_id)
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:bg-green-700 dark:text-green-100 rounded-full">
                            Bank
                        </span>
                        @else
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:bg-green-700 dark:text-green-100 rounded-full">
                            Store
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <div class="flex space-x-3">
                            <a href="{{ route('tabungan.download', $item->invoice) }}" target="_blank">
                                <div class="w-full inline-flex items-center bg-white leading-none text-red-600 rounded-full p-1 px-2 shadow text-sm capitalize">
                                    <span class="text-xs inline-flex bg-red-600 hover:bg-red-800 text-white rounded-full py-1 px-3 justify-center items-center">Print</span>
                                    <span class="inline-flex px-2 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <td class="px-4 py-3 text-sm" colspan="5">
                    Tidak ada data
                </td>
                @endforelse
            </tbody>
        </table>
        <div class="my-4 mx-6">
            {{ $tabungan->links() }}
        </div>
    </x-div-table>
</x-main-layout>
