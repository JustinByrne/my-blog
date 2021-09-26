<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        @livewire('slug')
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-button>
                            Save
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>