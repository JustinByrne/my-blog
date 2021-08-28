<x-public-layout>
    <x-slot name="title">
        {{ config('app.name', 'Laravel') }}
    </x-slot>
    <div class="flex flex-col space-y-20 px-4 lg:px-40 py-4">
        @foreach ($articles as $article)
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 h-56">
                <div
                    @class([
                        'lg:col-span-2',
                        'lg:order-last' => $loop->odd,
                    ])
                >
                    @if ($article->getMedia()->count())
                        <a href="{{ $article->path() }}">
                            <img src="{{ $article->getFirstMediaUrl() }}" class="rounded-md shadow-md filter drop-shadow-md w-full object-cover mt-0">
                        </a>
                    @endif
                </div>
                <div
                    @class([
                        'lg:col-span-3' => $article->getMedia()->count(),
                        'lg:col-span-5' => ! $article->getMedia()->count(),
                    ])
                >
                    <div class="flex justify-between text-xs">
                        <span class="text-red-700 font-bold">
                            {{ $article->category->name }}
                        </span>
                        <span>
                            {{ $article->published_at->format('dS M Y') }}
                        </span>
                    </div>
                    <a href="{{ $article->path() }}" class="hover:text-red-800">
                        <h2 class="font-bold text-2xl mt-2 mb-4">
                            {{ $article->title }}
                        </h2>
                    </a>
                    <div class="prose prose-red mb-2">
                        {!! \Illuminate\Support\Str::words($article->content, 40, '...') !!}
                    </div>
                    <small>
                        @foreach ($article->tags as $tag)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </small>
                </div>
            </div>
        @endforeach
    </div>
</x-public-layout>