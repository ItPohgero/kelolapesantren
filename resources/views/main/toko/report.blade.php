<x-main-layout>
    <x-search></x-search>
    <div class="flex items-center mb-3 font-bold capitalize justify-between">
        <main class="flex items-center">
            <span>Toko</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>Report</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>{{ $toko->nama }}</span>
        </main>
    </div>
    <x-error-modal></x-error-modal>
    <x-alert></x-alert>
    <x-div-table>
        <main class="p-2 grid grid-cols-1 md:grid-cols-4 space-y-2 items-center md:space-y-0 md:gap-2">
            <div>
                <a target="_blank" href="{{ route('toko.report.option', ['option' => 'hari-ini', 'hash' => $toko->hash]) }}" class="h-10 px-4 py-2 text-sm bg-white rounded justify-center border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo flex items-center w-full">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                    <span> Hari ini</span>
                </a>
            </div>
            <div>
                <a target="_blank" href="{{ route('toko.report.option', ['option' => 'bulan-ini', 'hash' => $toko->hash]) }}" class="h-10 px-4 py-2 text-sm bg-white rounded justify-center border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo flex items-center w-full">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                    <span> Bulan ini</span>
                </a>
            </div>
            <div>
                <a target="_blank" href="{{ route('toko.report.option', ['option' => 'tahun-ini', 'hash' => $toko->hash]) }}" class="h-10 px-4 py-2 text-sm bg-white rounded justify-center border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo flex items-center w-full">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                    <span> Tahun ini</span>
                </a>
            </div>
            <div class="w-full">
                <form action="{{ route('toko.report.choose', $toko->hash) }}" method="post">
                    @csrf
                    <div>
                        <div class="flex justify-between">
                            <div>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded shadow-sm h-10" type="month" name="query" required>
                            </div>
                            <div>
                                <button class="bg-gray-400 text-white border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded shadow-sm h-10 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <hr class="my-4 border-dashed">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">INC</th>
                    <th class="px-4 py-3">Desc</th>
                    <th class="px-4 py-3">Nominal</th>
                    <th class="px-4 py-3">Kwitansi</th>
                    <th class="px-4 py-3">transaksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($data as $item)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <span class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $item->invoice }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->santri->nama }}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->santri->code }}
                                </p>
                            </div>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        {{ $item->desc }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ number_format($item->nominal) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        Print
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->created_at }}
                    </td>
                </tr>
                @empty
                <td class="px-4 py-3 text-xs text-center" colspan="5">
                    Data tidak ditemukan
                </td>
                @endforelse
            </tbody>
        </table>
        <div class="my-4 mx-6">
            {{ $data->links() }}
        </div>
    </x-div-table>
</x-main-layout>
