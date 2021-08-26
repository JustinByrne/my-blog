<x-public-layout>
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    {!! $article->content !!}
</x-public-layout>