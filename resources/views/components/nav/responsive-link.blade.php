@props(['active' => false])

<a {{ $attributes->class([
        'block pl-3 pr-4 py-2 border-l-4 text-base font-medium focus:outline-none transition duration-150 ease-in-out',
        'border-red-400 text-red-700 bg-red-50 focus:text-red-800 focus:bg-red-100 focus:border-red-700' => $active,
        'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300' => ! $active,
    ]) }}>
    {{ $slot }}
</a>