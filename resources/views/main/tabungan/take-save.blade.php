<x-main-layout>
    <x-search></x-search>
    <div class="mx-1 p-5 md:mx-72 bg-white rounded-xl shadow">
        <x-alert></x-alert>
        <div class="flex justify-between items-center border-b border-dashed pb-2">
            <div>
                <p class="font-bold">an. <span class="capitalize">{{ $santri->nama }}</span></p>
                <p class="text-yellow-500 text-xs">code {{ $santri->code }}</p>
            </div>
            <div class="bg-gray-100 py-1 px-3 rounded">
                <span class="text-xs">Saldo </span>
                <span class="font-bold">Rp. {{ number_format($plus - $minus) }}</span>
            </div>
        </div>
        <form method="POST" action="{{ route('tabungan.store') }}" autocomplete="off">
            @csrf
            <input type="hidden" name="code" value="{{ $santri->code }}">
            <div class="mb-4">
                <div class="flex justify-between">
                    <main class="mt-2">
                        <label for="setor">
                            <div class="py-2 bg-gray-100 rounded shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex justify-center mt-2">
                                    <input type="radio" required name="status" value="1" id="setor" class="form-radio h-4 w-4 text-yellow-600 border-yellow-200">
                                </div>
                            </div>
                            <p class="text-center text-green-400 capitalize mt-1 text-sm font-bold">Setor Tunai</p>
                        </label>
                    </main>
                    <main class="mt-2">
                        <label for="tarik">
                            <div class="py-2 bg-gray-100 rounded shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex justify-center mt-2">
                                    <input type="radio" required name="status" value="0" id="tarik" class="form-radio h-4 w-4 text-yellow-600 border-yellow-200">
                                </div>
                            </div>
                            <p class="text-center text-red-400 capitalize mt-1 text-sm font-bold">Tarik Tunai</p>
                        </label>
                    </main>
                </div>
                <div class="mt-1">
                    <x-error for="status"></x-error>
                </div>
            </div>
            <div class="mb-1">
                <label class="text-xs">Nominal dalam rupiah</label>
                <div>
                    <input type="number" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-bold text-center rounded-md shadow-sm" name="nominal" required placeholder="0">
                </div>
                <div class="mt-1">
                    <x-error for="nominal"></x-error>
                </div>
            </div>
            <div class="mb-1">
                <label class="text-xs">Description</label>
                <div>
                    <textarea rows="1" required class="p-4 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="desc" placeholder="Deskripsi transaksi"></textarea>
                </div>
                <div class="mt-1">
                    <x-error for="desc"></x-error>
                </div>
            </div>
            <div class="mb-1">
                <label class="text-xs">Your Password</label>
                <div>
                    <input type="password" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-bold text-center rounded-md shadow-sm" name="password" placeholder="******" required>
                </div>
            </div>
            <div class="mb-1 flex justify-between mt-2 text-sm">
                <button type="submit" class="w-max bg-gray-700 hover:bg-gray-900 py-2 px-3 rounded text-gray-50 flex items-center justify-center">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <span> Submit</span>
                </button>
            </div>
        </form>
    </div>
</x-main-layout>
