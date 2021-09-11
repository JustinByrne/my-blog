<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($media as $image)
        <img class="w-full max-h-36 object-cover cursor-pointer" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}">
    @endforeach
</div>
