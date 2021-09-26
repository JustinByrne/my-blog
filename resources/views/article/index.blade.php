<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end pb-3">
                        <x-link :href="route('articles.create')">
                            New Article
                        </x-link>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 w-16 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Image
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-36 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Category
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-60 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tags
                                                </th>
                                                <th scope="col" class="px-5 py-3 w-36 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Published
                                                </th>
                                                <th scope="col" class="relative px-3 py-3 w-40">
                                                    <span class="sr-only">View, edit and delete</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($articles as $article)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            @if ($article->getMedia()->count())
                                                                <img class="h-10 w-10 object-cover" src="{{ $article->getFirstMediaUrl() }}" alt="">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900 capitalize">
                                                            {{ $article->title }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $article->category->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @foreach ($article->tags as $tag)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{ $tag->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if (! is_null($article->published_at))
                                                            {{ $article->published_at->format('d/m/Y H:i') }}
                                                        @endif
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex justify-around">
                                                            @if (! is_null($article->published_at))
                                                                <a href="{{ $article->path() }}" class="text-red-600 hover:text-red-900">
                                                                    View
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('articles.edit', $article->slug) }}" class="text-red-600 hover:text-red-900">
                                                                Edit
                                                            </a>
                                                            <a
                                                                href="{{ route('articles.destroy', $article->slug) }}"
                                                                class="text-red-600 hover:text-red-900"
                                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $article->id }}').submit();"
                                                            >
                                                                Delete
                                                            </a>
                                                            <form id="delete-{{ $article->id }}" action="{{ route('articles.destroy', $article->slug) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pt-3">
                                    {{ $articles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>