<x-public-layout :image="$article->getFirstMediaUrl()">
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    {!! $article->content !!}
</x-public-layout>