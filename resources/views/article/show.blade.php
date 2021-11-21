<x-public-layout :image="$article->getFirstMediaUrl()" :model="$article">
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <x-slot name="subtitle">
        Published on {{ $article->published_at->format('dS M Y') }}
    </x-slot>
    <div>
        <div class="flex justify-between pb-6">
            <div>
                <strong>
                    Category:
                </strong>
                <a href="{{ route('categories.public', $article->category) }}" class="text-red-600 hover:underline">
                    {{ $article->category->name }}
                </a>
            </div>
            <div>
                <strong>Tags:</strong>
                @foreach ($article->tags as $tag)
                    <a href="{{ route('tags.public', $tag) }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 hover:bg-red-200 hover:text-red-900">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <section class="prose prose-red min-w-full">
            {!! $article->content !!}
        </section>
    </div>
</x-public-layout>