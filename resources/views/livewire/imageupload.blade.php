<div x-data x-init="
    FilePond.create($refs.input);
    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
">
    <label for="image" class="block text-sm font-medium text-gray-700">
        Image
    </label>
    <input type="file" name="image" x-ref="input">
</div>