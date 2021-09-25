@props(['active'])

<a @class([
        'group rounded-md px-3 py-2 flex items-center text-sm font-medium',
        'text-gray-900 hover:text-gray-900 hover:bg-gray-50' => ! $active,
        'bg-gray-50 text-gray-600 hover:bg-white' => $active
    ]) {{ $attributes->merge() }}>
    <svg @class([
            'flex-shrink-0 -ml-1 mr-3 h-6 w-6',
            'text-gray-400 group-hover:text-gray-500' => ! $active,
            'text-gray-500' => $active,
        ]) xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        {{ $icon }}
    </svg>
    <span class="truncate">
        {{ $slot }}
    </span>
</a>