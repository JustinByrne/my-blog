<div>
    <div class="col-span-6 sm:col-span-3 pb-4">
        @if (! $title)
            <x-label for="name">
                Name <span class="text-red-400">*</span>
            </x-label>
            <input
                wire:model.debounce.300ms="name"
                type="text"
                name="name"
                id="name"
                @class([
                    'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('name'),
                    'border-red-400' => $errors->has('name'),
                ])
                required="required"
                value="{{ old('name') }}"
            >
        @else
            <x-label for="title">
                Title <span class="text-red-400">*</span>
            </x-label>
            <input
                wire:model.debounce.300ms="name"
                type="text"
                name="title"
                id="title"
                @class([
                    'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('title'),
                    'border-red-400' => $errors->has('title'),
                ])
                required="required"
                value="{{ old('title') }}"
            >
        @endif
    </div>
    <div class="col-span-6 sm:col-span-3">
        <x-label for="slug">
            Slug <span class="text-red-400">*</span>
        </x-label>
        <input
            wire:model="slug"
            type="text"
            name="slug"
            id="slug"
            @class([
                'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                'border-gray-300' => ! $errors->has('slug'),
                'border-red-400' => $errors->has('slug'),
            ])
            required="required"
            value="{{ old('slug') }}"
        >
    </div>
</div>
