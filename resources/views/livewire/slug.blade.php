<div>
    <div class="col-span-6 sm:col-span-3 pb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">
            Name <span class="text-red-400">*</span>
        </label>
        <input
            wire:model.debounce.300ms="name"
            type="text"
            name="name"
            id="name"
            @class([
                'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                'border-gray-300' => ! $errors->has('name'),
                'border-red-400' => $errors->has('name'),
            ])
            required="required"
            value="{{ old('name') }}"
        >
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label for="slug" class="block text-sm font-medium text-gray-700">
            Slug <span class="text-red-400">*</span>
        </label>
        <input
            wire:model="slug"
            type="text"
            name="slug"
            id="slug"
            @class([
                'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                'border-gray-300' => ! $errors->has('slug'),
                'border-red-400' => $errors->has('slug'),
            ])
            required="required"
            value="{{ old('slug') }}"
        >
    </div>
</div>
