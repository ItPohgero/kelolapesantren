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
            <span>Index</span>
        </main>
        <main>
            <button @click="openModal" class="bg-gray-700 hover:bg-gray-900 py-1 px-3 rounded text-gray-50 flex items-center">
                <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span> Add</span>
            </button>
        </main>
    </div>
    <x-error-modal></x-error-modal>
    <x-alert></x-alert>
    <x-div-table>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nama Toko</th>
                    <th class="px-4 py-3">PIN</th>
                    <th class="px-4 py-3">Pemilik</th>
                    <th class="px-4 py-3">Report</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($toko as $item)
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
                                <p class="font-semibold">{{ $item->nama }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->created_at }}
                                </p>
                            </div>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{$item->pin }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->pemilik }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <div class="flex space-x-3">
                            <a href="{{ route('toko.show', $item->hash) }}">
                                <div class="w-full inline-flex items-center bg-white leading-none text-red-600 rounded-full p-1 px-2 shadow text-sm capitalize">
                                    <span class="text-xs inline-flex bg-red-600 hover:bg-red-800 text-white rounded-full py-1 px-3 justify-center items-center">Report</span>
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
                <td class="px-4 py-3 text-xs text-center" colspan="4">
                    Data tidak ditemukan
                </td>
                @endforelse
            </tbody>
        </table>
        <div class="my-4 mx-6">
            {{ $toko->links() }}
        </div>
    </x-div-table>
    <!-- Modal -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-between">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Toko Baru
                </p>
                <!-- Modal description -->
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <form method="POST" action="{{ route('toko.store') }}" autocomplete="off">
                @csrf
                <div class="mt-4 mb-6">
                    <div class="my-2">
                        <x-jet-label for="nama" value="{{ __('Nama') }}" />
                        <x-jet-input id="nama" class="block my-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                        <x-error for="nama"></x-error>
                    </div>
                    <div class="my-2">
                        <x-jet-label for="pemilik" value="{{ __('Pemilik') }}" />
                        <x-jet-input id="pemilik" class="block my-1 w-full" type="text" name="pemilik" :value="old('pemilik')" required autofocus />
                        <x-error for="pemilik"></x-error>
                    </div>
                    <div class="my-2">
                        <x-jet-label for="phone" value="{{ __('Phone') }}" />
                        <x-jet-input id="phone" class="block my-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus />
                        <x-error for="phone"></x-error>
                    </div>
                </div>
                <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal" type="button" class="w-full px-5 py-3 text-sm font-medium leading-5 bg-gray-200 text-black transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Submit
                    </button>
                </footer>
            </form>
        </div>
    </div>
</x-main-layout>
