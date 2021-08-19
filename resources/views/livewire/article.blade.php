<div class="grid grid-cols-1 lg:grid-cols-7 gap-4">
    <div class="lg:col-span-5">
        <div class="col-span-6 sm:col-span-3 pb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">
                Title <span class="text-red-400">*</span>
            </label>
            <input
                wire:model.debounce.300ms="title"
                type="text"
                name="title"
                id="title"
                @class([
                    'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('title'),
                    'border-red-400' => $errors->has('title'),
                ])
                required="required"
                value="{{ old('title') }}"
            >
        </div>
        <div class="col-span-6 sm:col-span-3 pb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">
                Slug <span class="text-red-400">*</span>
            </label>
            <input
                wire:model="slug"
                type="text"
                name="slug"
                id="slug"
                autocomplete="off"
                @class([
                    'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('slug'),
                    'border-red-400' => $errors->has('slug'),
                ])
                required="required"
                value="{{ old('slug') }}"
            >
        </div>
        <div class="col-span-6 sm:col-span-3 pb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">
                Content <span class="text-red-400">*</span>
            </label>
            <textarea
                id="editor"
                @class([
                    'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('slug'),
                    'border-red-400' => $errors->has('slug'),
                ])
            ></textarea>
        </div>
    </div>
    <div class="lg:col-span-2">
        <div class="col-span-6 sm:col-span-3 pb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">
                Category <span class="text-red-400">*</span>
            </label>
            <input
                wire:model="category"
                type="text"
                name="category"
                id="category"
                @class([
                    'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('category'),
                    'border-red-400' => $errors->has('category'),
                ])
                required="required"
                value="{{ old('category') }}"
            >
        </div>
        <div class="col-span-6 sm:col-span-3 pb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">
                Tags <span class="text-red-400">*</span>
            </label>
            <input
                wire:model="tags"
                type="text"
                name="tags"
                id="tags"
                @class([
                    'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                    'border-gray-300' => ! $errors->has('tags'),
                    'border-red-400' => $errors->has('tags'),
                ])
                required="required"
                value="{{ old('tags') }}"
            >
        </div>
    </div>
</div>
