<x-main-layout>
    <x-search></x-search>
    <div class="flex items-center mb-3 font-bold capitalize justify-between">
        <main class="flex items-center">
            <span>Santri</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>Relasi</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>Anggota</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>{{ $relasi->nama }}</span>
        </main>
        <main>
            <span>{{ $anggota->count() }} <small>Santri</small></span>
        </main>
    </div>
    <x-div-table>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Alamat</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($anggota as $item)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <a href="{{ route('santri.show', $item->code) }}" class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $item->nama }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->code }}
                                </p>
                            </div>
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            {{ $item->alamat }}
                        </p>
                    </td>
                </tr>
                @empty
                <td class="px-4 py-3 text-xs text-center" colspan="2">
                    <span>Data tidak ditemukan</span>
                </td>
                @endforelse
            </tbody>
        </table>

    </x-div-table>
</x-main-layout>
