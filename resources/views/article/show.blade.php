<x-public-layout :image="$article->getFirstMediaUrl()">
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <div class="prose prose-indigo">
        {!! $article->content !!}
    </div>
</x-public-layout>