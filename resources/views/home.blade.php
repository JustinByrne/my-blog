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
                        <img src="{{ $article->getFirstMediaUrl() }}" class="rounded-md shadow-md w-full object-cover mt-0">
                    @endif
                </div>
                <div
                    @class([
                        'lg:col-span-3 prose prose-indigo min-w-full',
                    ])
                >
                    <h2>
                        {{ $article->title }}
                    </h2>
                    <div>
                        {!! \Illuminate\Support\Str::words($article->content, 40, '...') !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-public-layout>