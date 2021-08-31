<div class="pb-4">
    <label for="category_id" class="block text-sm font-medium text-gray-700">
        Category <span class="text-red-400">*</span>
    </label>
    <select
        name="category_id"
        @class([
            'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
            'border-gray-300' => ! $errors->has('category'),
            'border-red-400' => $errors->has('category'),
        ])
        required="required"
    >
        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                @if (old('category_id') == $category->id)
                    selected="selected"
                @elseif ($category->id == 1)
                    selected="selected"
                @endif
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
