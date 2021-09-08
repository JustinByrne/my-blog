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
                    <div class="flex justify-end pb-4">
                        <div class="w-full" x-data x-init="getImg($refs.input)">
                            <input type="file" name="image" id="image" x-ref="input">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($media as $image)
                            <img class="w-full max-h-36 object-cover" src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getImg(element) {
            FilePond.create(element);
            FilePond.setOptions({
                server: {
                    url: '{{ route('media.filepond-upload') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        }
    </script>
</x-app-layout>