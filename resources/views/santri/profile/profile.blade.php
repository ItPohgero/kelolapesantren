<x-alert></x-alert>
<x-div-table>
    <table class="w-full whitespace-no-wrap">
        <tbody class="bg-white dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400 bg-gray-100">
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <Span>Nama</Span>
                    </div>
                </td>
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <span>{{santri()->nama}}</span>
                    </div>
                </td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <Span>Code</Span>
                    </div>
                </td>
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <span>{{santri()->code}}</span>
                    </div>
                </td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-400 bg-gray-100">
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <Span>Alamat</Span>
                    </div>
                </td>
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <span>{{santri()->alamat}}</span>
                    </div>
                </td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <Span>Relasi</Span>
                    </div>
                </td>
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        @foreach (santri()->relasis as $item)
                        <div>- {{ $item->nama }}</div>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-400 bg-gray-100">
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <Span>Saldo Tabungan</Span>
                    </div>
                </td>
                <td class="px-2 py-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <span>Rp. {{ number_format($plus - $minus) }}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</x-div-table>
