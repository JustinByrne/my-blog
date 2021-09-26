<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end pb-3">
                        <x-link :href="route('tags.create')">
                            New Tag
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
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-60 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    # of Articles
                                                </th>
                                                <th scope="col" class="relative px-3 py-3 w-36">
                                                    <span class="sr-only">View, edit and delete</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($tags as $tag)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{-- <input type="checkbox" name="id" value="{{ $tag->id }}"> --}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900 capitalize">
                                                            {{ $tag->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $tag->articles_count }}
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex justify-around">
                                                            <a href="{{ route('tags.edit', $tag->slug) }}" class="text-red-600 hover:text-red-900">Edit</a>
                                                            <a
                                                                href="{{ route('tags.destroy', $tag->slug) }}"
                                                                class="text-red-600 hover:text-red-900"
                                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $tag->id }}').submit();"
                                                            >
                                                                Delete
                                                            </a>
                                                            <form id="delete-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->slug) }}" method="POST" style="display: none;">
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
                                    {{ $tags->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>