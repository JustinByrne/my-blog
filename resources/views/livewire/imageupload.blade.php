<div>
    <x-label for="image">
        Image
    </x-label>

    @if (! is_null($article) && $article->getMedia()->count())
        <div class="flex items-center space-x-3 pb-5">
            <img class="h-20 w-full object-cover rounded" src="{{ $article->getFirstMediaUrl() }}" alt="">
        </div>
    @endif
    
    
    <div x-data x-init="getImg($refs.input)">
        <input type="file" name="image" id="image" x-ref="input">
    </div>

    <script>
        function getImg(element) {
            FilePond.create(element);
            FilePond.setOptions({
                server: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        }
    </script>
</div>