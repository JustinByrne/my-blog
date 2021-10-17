<x-app-layout ckeditor>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Article' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="grid grid-cols-1 lg:grid-cols-7 gap-4">
                            <div class="lg:col-span-5">
                                @livewire('slug', ['title' => true])
                                <div class="pt-4 max-w-full prose">
                                    <x-label for="content">
                                        Content <span class="text-red-400">*</span>
                                    </x-label>
                                    <textarea
                                        id="content"
                                        name="content"
                                        @class([
                                            'mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md editor',
                                            'border-gray-300' => ! $errors->has('slug'),
                                            'border-red-400' => $errors->has('slug'),
                                        ])
                                    ></textarea>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                @livewire('imageupload')
                                @livewire('category')
                                @livewire('tag')
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-button name="action" value="draft" :secondary="true">
                            Save as Draft
                        </x-button>
                        <x-button name="action" value="publish">
                            publish
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>