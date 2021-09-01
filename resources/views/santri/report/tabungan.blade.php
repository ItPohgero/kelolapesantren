<x-div-table>
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-2 py-3">Kategory</th>
                <th class="px-2 py-3">Rp / Keterangan</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($tabungan as $item)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-2 py-3">
                    <span class="flex items-center text-sm">
                        <!-- Avatar with inset shadow -->
                        <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                            <p class="font-semibold">{{ status($item->status) }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->created_at }}
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->invoice }}
                            </p>
                        </div>
                    </span>
                </td>
                <td class="px-2 py-3 text-xs">
                    <div class="w-max py-1 font-semibold leading-tight {{ ($item->status == 0)?'text-red-500':'text-green-500' }} rounded-full dark:bg-green-700 dark:text-green-100">
                        {{ ($item->status == 0)?'-':'' }}{{ number_format( $item->nominal) }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        {{ $item->desc }}
                    </div>
                </td>
            </tr>
            @empty
            <td class="pt-6 text-center" colspan="2">Tidak ada riwayat</td>
            @endforelse
        </tbody>
    </table>
</x-div-table>
