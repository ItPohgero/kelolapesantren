<x-main-layout>
    <div class="px-1 md:px-16">
        <div class="relative w-full md:ml-8 pr-8">
            <div class="border-r-2 border-gray-200 border-dotted absolute h-full top-0 z-0" style="left: 7px"></div>
            <ul class="list-none m-0 p-0">
                @forelse (\App\Models\TimeLine::whereUser_id(userId())->latest()->get() as $item)
                <li class="mb-2">
                    <div class="flex items-center mb-1">
                        <div class="bg-indigo-600 rounded-full h-4 w-4 border-gray-200 border-2 z-10">
                        </div>
                        <div class="flex-1 ml-4 font-medium">{{ $item->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="ml-8">
                        {{ $item->message }}
                    </div>
                </li>
                @empty
                <li class="mb-2">
                    <div class="flex items-center mb-1">
                        <div class="bg-indigo-600 rounded-full h-4 w-4 border-gray-200 border-2 z-10">
                        </div>
                        <div class="flex-1 ml-4 font-medium">--</div>
                    </div>
                    <div class="ml-8">
                        Tidak ada riwayat history dalam aplikasi ini
                    </div>
                </li>

                @endforelse
            </ul>
        </div>
    </div>
</x-main-layout>
