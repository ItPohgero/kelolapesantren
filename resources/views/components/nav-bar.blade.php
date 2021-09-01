@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-yellow-100 p-2 rounded-lg flex items-center justify-center text-yellow-400'
: 'bg-gray-50 p-2 rounded-lg flex items-center justify-center text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
