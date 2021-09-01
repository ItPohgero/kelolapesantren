<x-main-layout>
    <x-search></x-search>
    <div class="flex items-center mb-3 font-bold capitalize justify-between">
        <main class="flex items-center">
            <span>Joined</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>{{ $santri->nama }}</span>
        </main>
        <main>
            <button @click="openModal" class="bg-gray-700 hover:bg-gray-900 py-1 px-3 rounded text-gray-50 flex items-center">
                <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span>New Relasi</span>
            </button>
        </main>
    </div>
    <x-alert></x-alert>
    <main class="bg-white rounded-xl shadow p-5">
        <small>Relasi santri adalah kelompok dalam kelas, baik formal atau nonformal dan agenda yang sifatnya tentatif lainnya.</small>
        <div class="w-full">
            <div class="grid grid-cols-2 gap-2 bg-gray-50 p-2 my-1 rounded">
                <div>Nama</div>
                <div>: {{ $santri->nama }}</div>
            </div>
            <div class="grid grid-cols-2 gap-2 bg-yellow-50 p-2 my-1 rounded">
                <div>Code</div>
                <div>: {{ $santri->code }}</div>
            </div>
            <div class="grid grid-cols-2 gap-2 bg-gray-50 p-2 my-1 rounded">
                <div>Alamat</div>
                <div>: {{ $santri->alamat }}</div>
            </div>
        </div>
        <hr class="my-2 border-dashed">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="w-full">
                <form method="POST" action="{{ route('relasi.upload') }}" autocomplete="off">
                    @csrf
                    <input type="hidden" name="santri_id" value="{{ $id }}">
                    <div class="my-2">
                        <select class="block my-1 w-full order-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm border-gray-300 py-2 px-4" name="relasi_id">
                            @foreach ($relasi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Update') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            <div class="w-full">
                <p>Daftar Relasi</p>
                @forelse ($santri->relasis as $item)
                <div class="my-2 flex justify-between">
                    <span>- {{ $item->nama }}</span>
                    <a onclick="return confirm('apakah anda yakin akan remove {{ $item->nama }}')" href="{{ route('relasi.remove', ['santri_id' => $santri->id, 'relasi_id' => $item->id]) }}" class="py-1 px-3 rounded bg-red-500 text-white ml-8">
                        R
                    </a>
                </div>
                @empty
                <p class="text-red-500">Tidak ada relasi yang terkait</p>
                @endforelse
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-between">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Create New Relasi
                </p>
                <!-- Modal description -->
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <form method="POST" action="{{ route('relasi.store') }}" autocomplete="off">
                @csrf
                <div class="mt-4 mb-6">
                    <div class="my-2">
                        <x-jet-label for="nama" value="{{ __('Nama Relasi') }}" />
                        <small>Relasi tidak bisa dihapus dan hanya bisa direname jika anda menambahkannya.</small>
                        <x-jet-input id="nama" class="block my-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                        <x-error for="nama"></x-error>
                    </div>
                </div>
                <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal" type="button" class="w-full px-5 py-3 text-sm font-medium leading-5 bg-gray-300 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
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
