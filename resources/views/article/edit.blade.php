<x-app-layout ckeditor>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 bg-white border-b border-gray-200">
                        @foreach ($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                        <div class="grid grid-cols-1 lg:grid-cols-7 gap-4">
                            <div class="lg:col-span-5">
                                @livewire('slug', ['model' => $article ,'title' => true])
                                <div class="pt-4 max-w-full prose">
                                    <x-label for="content">
                                        Content <span class="text-red-400">*</span>
                                    </x-label>
                                    <textarea
                                        id="content"
                                        name="content"
                                        @class([
                                            'editor mt-1 focus:ring-red-500 focus:border-red-500 block w-full shadow-sm sm:text-sm rounded-md',
                                            'border-gray-300' => ! $errors->has('slug'),
                                            'border-red-400' => $errors->has('slug'),
                                        ])
                                    >{{ old('content', $article->content) }}</textarea>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                @livewire('imageupload', ['article' => $article])
                                @livewire('category', ['article' => $article])
                                @livewire('tag', ['model' => $article])
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-button name="action" value="draft" :secondary="true">
                            Save as Draft
                        </x-button>
                        @if (! is_null($article->published_at))
                            <x-button>
                                Update
                            </x-button>
                        @else
                            <x-button name="action" value="publish">
                                publish
                            </x-button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>