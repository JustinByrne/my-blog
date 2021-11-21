<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @if (! is_null($site_logo))<link rel="shortcut icon" type="image/png" href="{{ $site_logo }}"/>@endif
        <title>{{ $title != $site_name ? ucwords($title) . ' | ' . $site_name : $site_name }}</title>
        <x-seo-tags :title="$title" :model="$model ?? null" :image="$image" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/highlight.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 relative flex flex-col">
            <header class="bg-white shadow-lg fixed w-full z-10">
                <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex justify-between w-full">
                                <!-- Logo -->
                                <div class="flex-shrink-0 flex items-center">
                                    <a href="/">
                                        {{ $site_name }}
                                    </a>
                                </div>
                
                                <!-- Navigation Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    <x-nav.link :href="route('home')" :active="request()->routeIs('home')">
                                        {{ __('Home') }}
                                    </x-nav.link>
                                    @foreach (App\Models\Page::whereNotNull('published_at')->orderBy('order')->get() as $menu)
                                        <x-nav.link :href="route('pages.show', $menu)" :active="\Request::Is('pages.show', $menu)">
                                            {{ $menu->title }}
                                        </x-nav.link>
                                    @endforeach

                                    @auth
                                        <x-nav.link :href="url('/dashboard')">
                                            {{ __('Dashboard') }}
                                        </x-nav.link>
                                    @else
                                        <x-nav.link :href="route('login')">
                                            {{ __('Login') }}
                                        </x-nav.link>
                                    @endauth
                                </div>
                            </div>
                
                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-nav.responsive-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav.responsive-link>

                            @foreach (App\Models\Page::whereNotNull('published_at')->orderBy('order')->get() as $menu)
                                <x-nav.responsive-link :href="route('pages.show', $menu)" :active="\Request::Is('pages.show', $menu)">
                                    {{ $menu->title }}
                                </x-nav.responsive-link>
                            @endforeach

                            @auth
                                <x-nav.responsive-link :href="url('/dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav.responsive-link>
                            @else
                                <x-nav.responsive-link :href="route('login')">
                                    {{ __('Login') }}
                                </x-nav.responsive-link>
                            @endauth
                        </div>
                    </div>
                </nav>
            </header>

            <main class="pt-16 flex-grow">
                <div class="w-full h-56 lg:h-96 bg-cover bg-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500" @if (! is_null($image)) style="background-image: url('{{ $image }}')" @endif>
                    <div class="bg-black bg-opacity-60 w-full h-full flex justify-center items-center">
                        <h1 class="text-white font-bold text-3xl md:text-4xl lg:text-5xl px-8 text-center">
                            {{ ucwords($title) }}
                            
                            @if (! is_null($subtitle))
                                <br>
                                <span class="text-base font-thin align-middle text-gray-300">
                                    {{ $subtitle }}
                                </span>
                            @endif
                        </h1>
                    </div>
                </div>
                <div class="max-w-7xl lg:mx-8 xl:mx-auto pb-4 lg:pb-0">
                    <div class="min-w-full bg-white py-8 px-8 lg:px-10 lg:rounded-lg lg:shadow-lg lg:transform lg:-translate-y-16">
                        {{ $slot }}
                    </div>
                </div>
            </main>

            @include('layouts.footer')
        </div>
    </body>
</html>