<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <header class="bg-white shadow">
                <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex justify-between w-full">
                                <!-- Logo -->
                                <div class="flex-shrink-0 flex items-center">
                                    <a href="/">
                                        {{ config('app.name', 'Laravel') }}
                                    </a>
                                </div>
                
                                <!-- Navigation Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                        {{ __('Home') }}
                                    </x-nav-link>
                                    @foreach (App\Models\Page::whereNotNull('published_at')->orderBy('order')->get() as $menu)
                                        <x-nav-link :href="route('pages.show', [$menu->slug])" :active="\Request::Is('pages.show', [$menu->slug])">
                                            {{ $menu->title }}
                                        </x-nav-link>
                                    @endforeach

                                    @auth
                                        <x-nav-link :href="url('/dashboard')">
                                            {{ __('Dashboard') }}
                                        </x-nav-link>
                                    @else
                                        <x-nav-link :href="route('login')">
                                            {{ __('Login') }}
                                        </x-nav-link>
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
                            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-responsive-nav-link>
                            @foreach (App\Models\Page::whereNotNull('published_at')->orderBy('order')->get() as $menu)
                                <x-responsive-nav-link :href="route('pages.show', [$menu->slug])" :active="\Request::Is('pages.show', [$menu->slug])">
                                    {{ $menu->title }}
                                </x-responsive-nav-link>
                            @endforeach
                        </div>
                    </div>
                </nav>
            </header>

            <main>
                <div class="w-full h-96 bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/956999/milky-way-starry-sky-night-sky-star-956999.jpeg')">
                    <div class="bg-white bg-opacity-10 w-full h-full flex justify-center items-center">
                        <h1 class="text-white font-black text-5xl">
                            {{ $title }}
                        </h1>
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>