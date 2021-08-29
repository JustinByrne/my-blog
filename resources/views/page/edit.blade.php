<x-app-layout ckeditor>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('pages.update', $page) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="lg:col-span-5">
                            @livewire('slug', ['model' => $page, 'title' => true])
                            <div class="py-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Order <span class="text-red-400">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="order"
                                    id="order"
                                    @class([
                                        'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                                        'border-gray-300' => ! $errors->has('order'),
                                        'border-red-400' => $errors->has('order'),
                                    ])
                                    required="required"
                                    value="{{ old('order', $page->order) }}"
                                >
                            </div>
                            <div class="max-w-full prose">
                                <label for="content" class="block text-sm font-medium text-gray-700 pb-2">
                                    Content <span class="text-red-400">*</span>
                                </label>
                                <textarea
                                    id="editor"
                                    name="content"
                                    @class([
                                        'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                                        'border-gray-300' => ! $errors->has('slug'),
                                        'border-red-400' => $errors->has('slug'),
                                    ])
                                >{!! $page->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" name="action" value="draft" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Save as Draft
                        </button>
                        @if (! is_null($page->published_at))
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Update
                            </button>
                        @else
                            <button type="submit" name="action" value="publish" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Publish
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>