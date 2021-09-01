<x-guest-layout>
    <div class="min-h-screen bg-gray-400 flex justify-center items-center px-2">
        <div class="absolute w-60 h-60 rounded-xl bg-gray-300 top-5 left-16 z-0 transform rotate-45 hidden md:block"></div>
        <div class="absolute w-48 h-48 rounded-xl bg-gray-300 bottom-6 right-10 transform rotate-12 hidden md:block"></div>
        <div class="p-6 w-max bg-white rounded-2xl shadow-xl z-20">
            <!-- component -->
            <div class="text-center py-1">
                <p class="text-gray-800 font-bold uppercase">TARIK dan SETOR TUNAI</p>
                <p class="text-xs capitalize">{{ session()->get('user_tabungan')->an }}</p>
                <p class="text-xs capitalize">{{ session()->get('user_tabungan')->code }}</p>
            </div>
            <x-alert></x-alert>
            <main class="py-1">
                <div class="py-1 bg-gray-50 rounded-lg">
                    <div class="px-2">
                        <!-- loop -->
                        <div class="py-2 my-1 px-4 grid grid-cols-2 text-xs border-b border-dashed items-center bg-gray-200 rounded-lg">
                            <div class="capitalize">Nama</div>
                            <div class="text-right capitalize">
                                {{ $santri->nama }}
                            </div>
                        </div>
                        <div class="py-2 my-1 px-4 grid grid-cols-2 text-xs border-b border-dashed items-center bg-gray-200 rounded-lg">
                            <div class="capitalize">Code</div>
                            <div class="text-right capitalize">
                                {{ $santri->code }}
                            </div>
                        </div>
                        <div class="py-2 my-1 px-4 grid grid-cols-2 text-xs border-b border-dashed items-center bg-blue-200 rounded-lg">
                            <div class="capitalize">Saldo</div>
                            <div class="text-right capitalize">
                                {{ number_format($plus - $minus) }}
                            </div>
                        </div>
                        <!-- loop -->
                        <form action="{{ route('barcode.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" value="{{ $santri->code }}" name="code">
                            <div class="flex justify-between px-4 py-2">
                                <div class="text-center font-bold text-red-400">
                                    <input type="radio" name="query" value="setor">
                                    <p class="text-xs">Setor Tunai</p>
                                </div>
                                <div class="text-center font-bold text-green-400">
                                    <input type="radio" name="query" value="tarik">
                                    <p class="text-xs">Tarik Tunai</p>
                                </div>
                            </div>
                            <div class="py-1">
                                <label for="nominal" class="text-xs">Nominal</label>
                                <input name="nominal" type="number" class="rounded-lg font-bold w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm placeholder-gray-300 text-left" placeholder="Rp" value="{{ old('nominal') }}">
                            </div>
                            <div class="py-1">
                                <textarea rows="4" name="desc" type="text" class="rounded-lg w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm text-xs placeholder-gray-300 text-left" placeholder="Keterangan">{{ old('desc') }}</textarea>
                            </div>
                            <div class="py-1 flex justify-center">
                                <section x-data="{ showModalPin: false }" :class="{'overflow-y-hidden': showModalPin}">
                                    <button type="button" class="w-full px-6 mr-2 bg-gray-900 py-2 rounded-lg text-blue-50 font-bold flex items-center justify-center" @click="showModalPin = true">
                                        <div class="mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                        </div>
                                        <span> Submit</span>
                                    </button>
                                    <!-- Modal2 -->
                                    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModalPin" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                            <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.away="showModalPin = false" x-show="showModalPin" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                                <header class="flex items-center justify-between p-2">
                                                    <h2 class="font-semibold">PIN Admin</h2>
                                                    <button class="focus:outline-none p-2" @click="showModalPin = false">
                                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                        </svg>
                                                    </button>
                                                </header>
                                                <main class="px-6 mb-6">
                                                    <div class="mt-2">
                                                        <p class="text-xs text-center">Masukkan PIN anda disini</p>
                                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                                    </div>
                                                </main>
                                                <footer class="flex justify-center bg-transparent">
                                                    <button class="bg-red-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" @click="showModalPin = false">
                                                        Konfirmasi
                                                    </button>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <a href="/" class="w-full ml-2 bg-yellow-400 py-2 px-3 rounded-lg text-gray-800 font-bold flex items-center justify-center">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <!-- component -->
        </div>
        <div class="w-40 h-40 absolute bg-gray-300 rounded-full top-0 right-12 hidden md:block"></div>
        <div class="w-20 h-40 absolute bg-gray-300 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block"></div>
    </div>
</x-guest-layout>
