<x-main-layout>
    <x-search></x-search>
    @if (\App\Models\Pondok::whereUser_id(auth()->user()->id)->first())
    <div class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
        </svg>
        <span class="ml-4">Akun sudah terverifikasi lembaga</span>
    </div>
    @else
    <div class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="ml-4">Akun belum terverifikasi lembaga, silahkan pergi ke menu profil</span>
    </div>
    @endif

    <!-- component -->
    <div class="mt-6 grid gap-3 mb-8 md:grid-cols-4">
        <!-- Card -->
        <div class="bg-gray-100 p-2 shadow-lg rounded-lg">
            <div class="flex items-center h-20 p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="p-3 mr-4 bg-green-500 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-900">Santri</p>
                    <p class="text-sm font-normal text-gray-800">{{ \App\Models\Santri::whereUser_id(userId())->count() }} <span class="text-xs">Santri</span></p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-100 p-2 shadow-lg rounded-lg">
            <div class="flex items-center h-20 p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="p-3 mr-4 bg-green-500 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-900">Toko (Terintergrasi)</p>
                    <p class="text-sm font-normal text-gray-800">{{ \App\Models\Toko::whereUser_id(userId())->count() }} <span class="text-xs">Toko</span></p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-100 p-2 shadow-lg rounded-lg">
            <div class="flex items-center h-20 p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="p-3 mr-4 bg-green-500 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-900">Relasi / Group</p>
                    <p class="text-sm font-normal text-gray-800">{{ \App\Models\Relasi::whereUser_id(userId())->count() }} <span class="text-xs">Relasi</span></p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="bg-gray-100 p-2 shadow-lg rounded-lg">
            <div class="flex items-center h-20 p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="p-3 mr-4 bg-green-500 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-900">Dev</p>
                    <p class="text-sm font-normal text-gray-800">IT Pohgero</p>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
