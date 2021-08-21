<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Article' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="grid grid-cols-1 lg:grid-cols-7 gap-4">
                            <div class="lg:col-span-5">
                                @livewire('slug', ['title' => true])
                                <div class="pt-4">
                                    <label for="content" class="block text-sm font-medium text-gray-700 pb-2">
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
                                <div class="pb-4">
                                    <label for="category_id" class="block text-sm font-medium text-gray-700">
                                        Category <span class="text-red-400">*</span>
                                    </label>
                                    <select
                                        name="category_id"
                                        @class([
                                            'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md',
                                            'border-gray-300' => ! $errors->has('category'),
                                            'border-red-400' => $errors->has('category'),
                                        ])
                                        required="required"
                                    >
                                        @foreach ($categories as $category)
                                            <option valule="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @livewire('tag')
                            </div>
                        </div>
                        {{-- @livewire('article') --}}
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Publish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>