<x-guest-layout>
    <div class="min-h-screen bg-gray-400 flex justify-center items-center">
        <div class="absolute w-60 h-60 rounded-xl bg-gray-300 top-5 left-16 z-0 transform rotate-45 hidden md:block"></div>
        <div class="absolute w-48 h-48 rounded-xl bg-gray-300 bottom-6 right-10 transform rotate-12 hidden md:block"></div>
        <div class="p-6 w-max bg-white rounded-2xl shadow-xl z-20">
            <section class="mt-4">
                <div>
                    <h1 class="text-xl font-bold text-center mb-4 cursor-pointer">Kartu ATM Santri</h1>
                </div>
            </section>
            <x-alert></x-alert>
            <section class="p-2 bg-gray-100 rounded-lg shadow">
                <div class="relative h-48 w-72 md:h-56 md:w-96 bg-gradient-to-br from-gray-600 to-gray-800 rounded-lg overflow-hidden">
                    <svg viewBox="0 0 220 192" width="220" height="192" fill="none" class="absolute -left-10 top-0 text-gray-700 opacity-50">
                        <defs>
                            <pattern id="837c3e70-6c3a-44e6-8854-cc48c737b659" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="220" height="192" fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)"></rect>
                    </svg>
                    <svg viewBox="0 0 220 192" width="220" height="192" fill="none" class="absolute -right-28 -bottom-20 text-gray-900 opacity-50">
                        <defs>
                            <pattern id="837c3e70-6c3a-44e6-8854-cc48c737b659" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="220" height="192" fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)"></rect>
                    </svg>
                    <div class="absolute right-8 bottom-2 h-24">
                        <x-jet-authentication-card-logo />
                    </div>
                    <div class="absolute top-10 left-8 h-12 w-16 bg-gradient-to-r from-yellow-400 to-yellow-200 opacity-90 rounded-lg overflow-hidden">
                        <span class="flex absolute top-1/2 left-1 h-full w-10 bg-opacity-50 rounded-lg transform -translate-y-1/2 -translate-x-1/2 border border-gray-400"></span>
                        <span class="flex absolute top-1/2 right-1 h-full w-10 bg-opacity-50 rounded-lg transform -translate-y-1/2 translate-x-1/2 border border-gray-400"></span>
                        <span class="flex absolute top-1.5 right-0 w-full h-5 bg-opacity-50 rounded-full transform -translate-y-1/2 border border-gray-400"></span>
                        <span class="flex absolute bottom-1.5 right-0 w-full h-5 bg-opacity-50 rounded-full transform translate-y-1/2 border border-gray-400"></span>
                    </div>
                    <div class="absolute bottom-20 left-8 text-white font-semibold text-sm space-x-1.5">
                        <span>****</span>
                        <span>****</span>
                        <span>****</span>
                        <span>ITP</span>
                    </div>
                    <div class="absolute bottom-16 left-8 text-gray-200 font-semibold text-sm">
                        <span>{{ $santri->code }}</span>
                    </div>
                    <div class="absolute bottom-6 left-8 text-gray-200 font-semibold text-lg uppercase">
                        <span>{{ $santri->nama }}</span>
                    </div>
                </div>
            </section>
            <section>
                <div class="py-3 px-4 w-full text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-lg flex justify-between mt-6">
                    <span>Saldo : </span>
                    <span>Rp. {{ number_format($plus - $minus) }}</span>
                </div>
            </section>
            <section class="flex justify-center mt-6 space-x-2">
                <section x-data="{ showModal1: false, showModal2: false }" :class="{'overflow-y-hidden': showModal1 || showModal2}">
                    <button class="bg-gray-600 font-semibold text-white p-2 w-32 rounded hover:bg-gray-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2" @click="showModal1 = true">
                        Tabungan
                    </button>
                    <button class="bg-red-600 font-semibold text-white p-2 w-32 rounded hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2" @click="showModal2 = true">
                        Toko
                    </button>

                    <!-- Modal1 -->
                    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal1" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                            <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.away="showModal1 = false" x-show="showModal1" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                <header class="flex items-center justify-between p-2">
                                    <h2 class="font-semibold">TABUNGAN</h2>
                                    <button class="focus:outline-none p-2" @click="showModal1 = false">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </button>
                                </header>
                                <form method="POST" action="{{ route('barcode.cek.tabungan', $santri->code) }}">
                                <main class="px-6 mb-6">
                                        @csrf
                                        <div class="mt-2">
                                            <p class="text-xs">Code Hash</p>
                                            <x-jet-input id="code" class="block mt-1 w-full" type="text" name="code" required autocomplete="current-password" />
                                        </div>
                                        <div class="mt-2">
                                            <p class="text-xs">Password</p>
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                        </div>
                                    </main>
                                    <footer class="flex justify-center bg-transparent">
                                        <button type="submit" class="bg-red-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" @click="showModal2 = false">
                                            Akses
                                        </button>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal2 -->
                    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal2" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                            <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.away="showModal2 = false" x-show="showModal2" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                <header class="flex items-center justify-between p-2">
                                    <h2 class="font-semibold">KODE TOKO</h2>
                                    <button class="focus:outline-none p-2" @click="showModal2 = false">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </button>
                                </header>
                                <form method="POST" action="{{ route('barcode.cek.payment', $santri->code) }}">
                                    @csrf
                                    <main class="px-6 mb-6">
                                        <div class="mt-2">
                                            <p class="text-xs text-center">Masukkan PIN Toko untuk memulai transaksi</p>
                                            <x-jet-input id="pin" class="block mt-1 w-full" type="password" name="pin" required autocomplete="current-pin" />
                                        </div>
                                    </main>
                                    <footer class="flex justify-center bg-transparent">
                                        <button type="submit" class="bg-red-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" @click="showModal2 = false">
                                            Konfirmasi
                                        </button>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        <div class="w-40 h-40 absolute bg-gray-300 rounded-full top-0 right-12 hidden md:block"></div>
        <div class="w-20 h-40 absolute bg-gray-300 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block"></div>
    </div>

</x-guest-layout>
