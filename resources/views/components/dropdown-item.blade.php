@props(['active' => false])

@php
    $classes = 'block text-left text-sm leading-6 px-3 hover:bg-gray-700 focus:bg-gray-700 hover:text-white focus:text-white';
    if ($active) $classes .= ' bg-black text-white'
@endphp

<a {{ $attributes(['class' => $classes])}}>
    {{ $slot }}
</a>