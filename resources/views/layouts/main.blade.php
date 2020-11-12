<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crocodile | Movies</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4  flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="">
                    <a href="/" class="flex items-center">
                        <img src="/img/logo.png" alt="logo" class="w-10"/>
                        <p class="pl-2 text-orange-500 font-bold">Crocodile</p>
                    </a>
                </li>
                <li class="md:ml-12 mt-3 md:mt-0">
                    <a href="/" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="/actors" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                @if(Request::is('/') or Request::is('movie/*'))
                    <livewire:search-drowpdown/>
                        @elseif(Request::is('actors') or Request::is('actors/*'))
                            <livewire:actors-search-dropdown/>
                                @elseif(Request::is('tv') or Request::is('tv/*'))
                                    <livewire:tv-show-search/>
                                        @endif
                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#">
                            <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </div>



            </div>

        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>

<script>
    feather.replace()
</script>

@yield('scripts')

</html>
