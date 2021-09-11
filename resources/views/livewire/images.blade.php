<div class="relative">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($media as $image)
            <img class="w-full max-h-36 object-cover cursor-pointer" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}" wire:click="viewImage('{{ $image->getFullUrl() }}')">
        @endforeach
    </div>

    <div
        @class([
            'absolute inset-0 bg-gray-900 bg-opacity-40',
            'hidden' => is_null($selectedImage)
        ])
    ></div>

    <div
        @class([
            'absolute origin-top-left bg-white p-4 rounded-md shadow-lg top-4 left-4 right-4 grid lg:grid-cols-3 gap-4',
            'hidden' => is_null($selectedImage)
        ])
    >
        <div class="lg:col-span-2">
            <img class="w-full" src="{{ $selectedImage }}">
        </div>
        <div>
            <div class="flex justify-end">
                <span class="cursor-pointer" wire:click="closeImage">X</span>
            </div>
        </div>
    </div>
</div>