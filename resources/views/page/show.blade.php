<x-public-layout>
    <x-slot name="title">
        {{ $page->title }}
    </x-slot>
    {!! $page->content !!}
</x-public-layout>