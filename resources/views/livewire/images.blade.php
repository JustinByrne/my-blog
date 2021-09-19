<div class="relative">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($media as $image)
            <img class="w-full max-h-36 object-cover cursor-pointer" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}" wire:click="viewImage({{ $image->id }})">
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
            'fixed transform top-20 lg:top-1/2 lg:-translate-y-1/2 inset-x-4 lg:max-w-screen-lg lg:mx-auto lg:max-h-screen bg-white p-4 rounded-lg grid lg:grid-cols-4 gap-4',
            'hidden' => is_null($selectedImage)
        ])
    >
        @if (! is_null($selectedImage) )
            <div class="lg:order-last flex flex-col">
                <div class="flex-grow p-4">
                    <div class="flex justify-end">
                        <span class="cursor-pointer" wire:click="closeImage">X</span>
                    </div>
                    <div class="prose prose-sm">
                        <h3>
                            {{ $selectedImage->name }}
                        </h3>
                        <p>
                            Size: {{ $selectedImage->getHumanReadableSizeAttribute() }}
                        </p>
                        <p>
                            Uploaded: {{ $selectedImage->created_at->format('d M Y') }}
                        </p>
                        <div>
                            <label for="alt_text">
                                Alt Text:
                            </label>
                            <x-input type="text" class="text-xs" wire:model="alt_text" id="alt_text" />
                        </div>
                        <div class="pt-3">
                            <label for="alt_text">
                                URL:
                            </label>
                            <x-input type="text" disabled class="text-xs bg-gray-100" value="{{ $selectedImage->getFullUrl() }}" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <form action="{{ route('media.delete', $selectedImage) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="shadow rounded-lg px-3 py-2 text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700">
                            Delete
                        </button>
                    </form>
                    <button type="button" wire:click="updateImage" class="shadow rounded-lg px-3 py-2 text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Save
                    </button>
                </div>
            </div>
            <div class="lg:col-span-3 aspect-w-4 aspect-h-3">
                <img class="w-full object-contain" src="{{ $selectedImage->getFullUrl() }}">
                
            </div>
        @endif
    </div>
</div>