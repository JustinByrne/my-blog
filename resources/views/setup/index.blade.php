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
                <div class="pb-12">
                    <h3 class="text-xl font-extrabold text-gray-700">
                        Prerequisites
                    </h3>
                    <dl class="mt-8 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
                        @foreach ($requirements as $requirement => $properties)
                            <div class="relative">
                                <dt>
                                    @if ($properties['result'])
                                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @else
                                        <svg class="absolute h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    @endif
                                    <p class="ml-9 text-lg leading-6 font-medium text-gray-700">
                                        {{ $requirement }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-9 text-base text-gray-500">
                                    {{ $properties['description'] }}
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
                {{-- <div class="pb-12">
                    <h3 class="text-xl font-extrabold text-gray-700">
                        .env File details
                    </h3>
                    <dl class="mt-8 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
                        @foreach ($requirements as $requirement => $properties)
                            <div class="relative">
                                <dt>
                                    @if ($properties['result'])
                                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @else
                                        <svg class="absolute h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    @endif
                                    <p class="ml-9 text-lg leading-6 font-medium text-gray-700">
                                        {{ $requirement }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-9 text-base text-gray-500">
                                    {{ $properties['description'] }}
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div> --}}
            </div>
        </main>
    </body>
</html>