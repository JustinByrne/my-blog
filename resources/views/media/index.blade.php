<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <div class="flex justify-end pb-3">
                        <a href="{{ route('articles.create') }}" class="shadow rounded-lg px-3 py-2 text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Upload new Image
                        </a>
                    </div> --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($media as $image)
                            <img class="w-full max-h-36 object-cover" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>