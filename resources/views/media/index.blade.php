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
                    @livewire('images', ['media' => $media])
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

            const pond = document.querySelector('.filepond--root');
            pond.addEventListener('FilePond:processfile', e => {
                console.log('File uploaded', e.detail);
                location.reload();
            });
        }

        
    </script>
</x-app-layout>