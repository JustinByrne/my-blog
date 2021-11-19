<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>My Blog Setup{{ ! is_null($title) ? ' - ' . $title : '' }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="bg-gradient-to-r from-green-300 via-blue-400 to-purple-400 h-screen w-screen">
        <main class="flex h-full justify-center p-8 items-start lg:items-center">
            {{ $slot }}
        </main>
    </body>
</html>