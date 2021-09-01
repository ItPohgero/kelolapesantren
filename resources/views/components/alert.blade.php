@if (session()->has('success'))
<div class="p-2 mb-3">
    <div class="w-full inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-sm">
        <span class="inline-flex bg-green-600 text-white rounded-full h-6 px-3 justify-center items-center text-">Alert</span>
        <span class="inline-flex px-2">{{ session()->get('success') }}</span>
    </div>
</div>
@endif
@if (session()->has('warning'))
<div class="p-2 mb-3">
    <div class="w-full inline-flex items-center bg-white leading-none text-red-600 rounded-full p-2 shadow text-sm">
        <span class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center text-">Alert</span>
        <span class="inline-flex px-2">{{ session()->get('warning') }}</span>
    </div>
</div>
@endif
