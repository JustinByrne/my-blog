<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end pb-3">
                        <a href="{{ route('categories.create') }}" class="shadow rounded-lg px-3 py-2 text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            New Category
                        </a>
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
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{-- <input type="checkbox" name="id" value="{{ $category->id }}"> --}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900 capitalize">
                                                            {{ $category->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $category->articles_count }}
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex justify-around">
                                                            <a href="{{ route('categories.edit', $category->slug) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                            <a
                                                                href="{{ route('categories.destroy', $category->slug) }}"
                                                                class="text-indigo-600 hover:text-indigo-900"
                                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $category->id }}').submit();"
                                                            >
                                                                Delete
                                                            </a>
                                                            <form id="delete-{{ $category->id }}" action="{{ route('categories.destroy', $category->slug) }}" method="POST" style="display: none;">
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
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>