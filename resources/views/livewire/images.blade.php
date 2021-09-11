<div class="relative">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($media as $image)
            <img class="w-full max-h-36 object-cover cursor-pointer" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}">
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
            <img class="w-full" src="https://images.unsplash.com/photo-1628191136272-08f5d3d9a6c0?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80">
        </div>
        <div>
            <div class="flex justify-end">
                X
            </div>
        </div>
    </div>
</div>