<x-setting-layout>
    <x-slot name="header">
        Social Media
    </x-slot>

    <form action="{{ route('settings.storeSocial') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <x-label for="facebook_url">
                            Facebook Link
                        </x-label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="facebook_url" id="facebook_url" class="w-full" :value="old('facebook_url', $settings->where('name', 'facebook_url')->first()->value)" placeholder="https://" />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <x-label for="instagram_url">
                            Instagram Link
                        </x-label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="instagram_url" id="instagram_url" class="w-full" :value="old('instagram_url', $settings->where('name', 'instagram_url')->first()->value)" placeholder="https://" />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <x-label for="github_url">
                            GitHub Link
                        </x-label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="github_url" id="github_url" class="w-full" :value="old('github_url', $settings->where('name', 'github_url')->first()->value)" placeholder="https://" />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <x-label for="twitter_url">
                            Twitter Link
                        </x-label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input type="text" name="twitter_url" id="twitter_url" class="w-full" :value="old('twitter_url', $settings->where('name', 'twitter_url')->first()->value)" placeholder="https://" />
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