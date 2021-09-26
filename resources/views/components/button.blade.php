@props(['secondary'])

@php
    $class = 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25 transition ease-in-out duration-150';

    if (! isset($secondary)){
        $class .= ' bg-red-600 hover:bg-red-500 active:bg-red-900 ring-red-300 focus:border-red-900';
    } else {
        $class .= ' bg-gray-800 hover:bg-gray-700 active:bg-gray-900 ring-gray-300 focus:border-gray-900';
    }
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
    {{ $slot }}
</button>
