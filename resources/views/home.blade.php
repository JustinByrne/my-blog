<x-public-layout>
    <x-slot name="title">
        {{ config('app.name', 'Laravel') }}
    </x-slot>
    <div class="flex flex-col space-y-8 px-4 lg:px-40 py-4">
        @foreach ($articles as $article)
            <div class="grid grid-cols-1 lg:grid-cols-4">
                <div
                    @class([
                        'lg:order-last' => $loop->odd,
                    ])
                >
                    @if ($article->getMedia()->count())
                        <img src="{{ $article->getFirstMediaUrl() }}" class="rounded-md shadow-md w-56 h-32 object-cover">
                    @endif
                </div>
                <div
                    @class([
                        'lg:col-span-3',
                        'lg:text-right' => $loop->even,
                    ])
                >
                    <h2>
                        {{ $article->title }}
                    </h2>
                    <div class="prose min-w-full">
                        {!! \Illuminate\Support\Str::words($article->content, 40, '...') !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-public-layout>