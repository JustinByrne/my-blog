<div class="relative">
    <x-label for="query">
        Tags
    </x-label>
    <input
        wire:model.debounce.300ms="query"
        type="text"
        id="query"
        autocomplete="off"
        class="mt-1 mb-2 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md border-gray-300"
    >
    @if (! is_null($query))
        <div class="absolute z-10 -mt-2 w-full bg-white rounded-b-lg shadow-lg">
            @forelse ($tags as $tag)
                <p
                    wire:click="add('{{ $tag['id'] }}', '{{ $tag['name'] }}')"
                    @class([
                        'px-2 py-1 cursor-pointer hover:bg-red-700 hover:text-white font-medium',
                        'rounded-b-lg' => $loop->last,
                    ])
                >
                    {{ $tag['name'] }}
                </p>
            @empty
                <p
                    wire:click="create('{{ $query }}')"
                    class="px-2 py-1 cursor-pointer hover:bg-red-700 hover:text-white font-medium rounded-b-lg"
                >
                    No Results - Create {{ $query }}
                </p>
            @endforelse
        </div>
    @endif

    <div class="flex flex-wrap gap-x-2 gap-y-1">
        @forelse ($selected as $id => $tag)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                {{ $tag }}
                <span
                    wire:click="remove('{{ $id }}')"
                    class="font-black pl-2 text-sm cursor-pointer"
                >
                    x
                </span>
            </span>
        @empty
        @endforelse
    </div>
    <input type="hidden" name="tags" value="@json(array_keys($selected))">
</div>
