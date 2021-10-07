<x-setting-layout>
    <x-slot name="header">
        General
    </x-slot>

    <form action="{{ route('settings.storeSettings') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="site_name" class="block text-sm font-medium text-gray-700">
                            Site Name
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="site_name" id="site_name" class="w-full" :value="old('site_name', $settings->where('name', 'site_name')->first()->value)" />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="tag_line" class="block text-sm font-medium text-gray-700">
                            Tag Line
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="tag_line" id="tag_line" class="w-full" :value="old('tag_line', $settings->where('name', 'tag_line')->first()->value)" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <x-button>
                    Save
                </x-button>
            </div>
        </div>
    </form>
</x-setting-layout>