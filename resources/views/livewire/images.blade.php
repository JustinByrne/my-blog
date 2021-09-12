<div class="relative">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($media as $image)
            <img class="w-full max-h-36 object-cover cursor-pointer" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}" wire:click="viewImage('{{ $image->getFullUrl() }}')">
        @endforeach
    </div>

    <div
        @class([
            'fixed inset-0 bg-gray-900 bg-opacity-40 cursor-pointer',
            'hidden' => is_null($selectedImage)
        ])
        wire:click="closeImage"
    ></div>

    <div
        @class([
            'fixed transform top-20 lg:top-1/2 lg:-translate-y-1/2 inset-x-4 lg:max-w-screen-lg lg:mx-auto lg:max-h-screen bg-white p-4 rounded-lg grid lg:grid-cols-3 gap-4',
            'hidden' => is_null($selectedImage)
        ])
    >
        <div class="lg:order-last">
            <div class="flex justify-end">
                <span class="cursor-pointer" wire:click="closeImage">X</span>
            </div>
        </div>
        <div class="lg:col-span-2 aspect-w-1 aspect-h-1">
            <img class="w-full object-contain" src="{{ $selectedImage }}">
        </div>
    </div>
</div>