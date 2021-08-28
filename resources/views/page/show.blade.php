<x-public-layout>
    <x-slot name="title">
        {{ $page->title }}
    </x-slot>
    <div class="prose prose-red">
        {!! $page->content !!}
    </div>
</x-public-layout>