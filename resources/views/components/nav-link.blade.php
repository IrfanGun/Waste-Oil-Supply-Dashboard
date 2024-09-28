@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex text-charleston-green bg-misty-rose font-medium py-1 px-2 rounded-sm rounded-xl w-full '
            : 'flex p-1 hover:text-charleston-green hover:font-medium hover:ml-1 py-1 px-2 text-light-grey';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

