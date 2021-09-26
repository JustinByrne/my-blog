<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end pb-3">
                        <x-link :href="route('pages.create')">
                            New Page
                        </x-link>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 w-8 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                                <th scope="col" class="px-6 py-3 w-auto text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-5 py-3 w-20 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Order
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
                                            @foreach ($pages as $page)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{-- <input type="checkbox" name="id" value="{{ $category->id }}"> --}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900 capitalize">
                                                            {{ $page->title }}
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $page->order }}
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if (! is_null($page->published_at))
                                                            {{ $page->published_at->format('d/m/Y H:i') }}
                                                        @endif
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex justify-around">
                                                            @if (! is_null($page->published_at))
                                                                <a href="{{ $page->path() }}" class="text-red-600 hover:text-red-900">
                                                                    View
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('pages.edit', $page->slug) }}" class="text-red-600 hover:text-red-900">
                                                                Edit
                                                            </a>
                                                            <a
                                                                href="{{ route('pages.destroy', $page->slug) }}"
                                                                class="text-red-600 hover:text-red-900"
                                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $page->id }}').submit();"
                                                            >
                                                                Delete
                                                            </a>
                                                            <form id="delete-{{ $page->id }}" action="{{ route('pages.destroy', $page->slug) }}" method="POST" style="display: none;">
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
                                    {{ $pages->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>