<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>My Blog Setup</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <main>
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        My Blog Setup
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        A Simple yet effective blog.
                    </p>
                </div>
                @yield('content')
            </div>
        </main>
    </body>
</html>