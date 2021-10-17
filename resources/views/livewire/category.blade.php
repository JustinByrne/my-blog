<div class="pb-4">
    <x-label for="category_id">
        Category <span class="text-red-400">*</span>
    </x-label>
    <div class="flex flex-col mt-1 h-36 border border-gray-300 rounded-md">
        <div class="flex flex-col mb-auto px-2 py-1 overflow-y-auto">
            @foreach ($categories as $category)
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        class="form-checkbox h-4 w-4 text-red-600 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                        value="{{ $category->id }}"
                        @if ($selectedCategory == $category->id)
                            checked
                        @endif
                        wire:click="changeCategory({{ $category->id }})"
                    >
                    <span class="ml-1 text-gray-700">
                        {{ $category->name }}
                    </span>
                </label>
            @endforeach
        </div>
        <div class="relative mt-1">
            <input type="text" wire:model="newCategory" class="focus:outline-none focus:ring-2 focus:ring-red-500 block w-full sm:text-sm border-0 border-t border-gray-300 rounded-b-md" placeholder="Add Category">
            <button wire:click="addCategory" type="button" class="absolute origin-top-right top-0 right-0 h-full w-10 bg-red-600 hover:bg-red-700 rounded-br-md font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                +
            </button>
        </div>
        <input type="hidden" name="category_id" wire:model="selectedCategory">
    </div>
</div>
