@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] . 'Poster' }}" class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['original_title'] }} ({{ $movie['release_date'] }})</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><i data-feather="star" class="w-4 fill-current text-orange-500"></i></span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                        {{ $movie['genres'] }}
                </div>

                <p class="text-gray-300 mt-8">{{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach($movie['crew'] as $crew)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{ isOpen: false }">
                    @if(count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                href="https://youtube.com/watch?v={{ $movie['videos']['results']['0']['key'] }}" target="_blank" class="flex inline-flex bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <i data-feather="play-circle" class="w-6"></i>
                                <span class="pl-2">Play Trailer</span>
                            </button>
                        </div>


                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show.transition.opacity="isOpen"
                        @keydown.escape="isOpen = false"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded" @click.away="isOpen = false">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="text-3xl leading-none hover:text-gray-300">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"

                                                    src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                                    style="border:0;" allow="autoplay; encrypted-media" allowfullscreen>

                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div><!-- movie info ends here -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['cast'] as $cast)
                        <div class="mt-8">
                                <a href="{{ route('actors.show', $cast['id']) }}">
                                    @if($cast['profile_path'])
                                        <img src="{{ "https://image.tmdb.org/t/p/w300/" . $cast['profile_path'] }}" alt="Photo of {{ $cast['name'] }}" class="hover:opacity-75 transition ease-in-out duration-100">
                                    @else
                                        <img src={{ 'https://ui-avatars.com/api/name='.$cast['name'] }}" alt="Photo of {{ $cast['name'] }}" style="height: 336px" class="hover:opacity-75 object-cover ease-in-out duration-100">
                                    @endif
                                </a>
                            <div class="mt-2">
                                <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                </div>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="movie-images border-b border-gray-800" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($movie['images'] as $image)
                        <div class="mt-8">
                            <a
                                @click.prevent="
                                isOpen = true
                                image= '{{ "https://image.tmdb.org/t/p/original/" . $image['file_path'] }}'
                                "
                                href="#"
                            >
                                <img src="{{ "https://image.tmdb.org/t/p/w500/" . $image['file_path'] }}" alt="Images from {{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-100">
                            </a>
                        </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded" @click.away="isOpen = false">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
