@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 pt-16">
    {{--Start of populars--}}
            <div class="popular-movies">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">popular movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($popularMovies as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres" />
                    @endforeach
                </div>
            </div>
    {{--End of Popular--}}

    {{--Start of Playing now--}}
            <div class="now-playing-movies py-24">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">now playing</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($nowPlayingMovies as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres" />
                    @endforeach
                </div>
            </div>
    {{--End of playing Now--}}
    </div>


@endsection
