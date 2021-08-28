<x-public-layout :image="$article->getFirstMediaUrl()">
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <x-slot name="subtitle">
        Published on {{ $article->published_at->format('dS M Y') }}
    </x-slot>
    <div class="prose prose-red min-w-full">
        <div class="flex justify-between pb-3">
            <div>
                <strong>
                    Category:
                </strong>
                <span class="text-red-600">
                    {{ $article->category->name }}
                </span>
            </div>
            <div>
                <strong>Tags:</strong>
                @foreach ($article->tags as $tag)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>
        {!! $article->content !!}
    </div>
</x-public-layout>