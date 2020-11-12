@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="Picture" class="w-64 lg:w-96">
                <ul class="flex items-center mt-4">
                        @if($social['facebook'])
                            <li>
                                <a href="{{ $social['facebook'] }}" title="facebook"><i data-feather="facebook" class="w-6 text-4xl"></i></a>
                            </li>
                        @endif

                         @if($social['twitter'])
                            <li class="pl-2">
                                <a href="{{ $social['twitter'] }}" title="twitter"><i data-feather="twitter" class="w-6 text-4xl"></i></a>
                            </li>
                        @endif

                        @if($social['instagram'])
                            <li class="pl-2">
                                <a href="{{ $social['instagram'] }}" class="target-blank" title="instagram"><i data-feather="instagram" class="w-6 text-4xl"></i></a>
                            </li>
                        @endif
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><i data-feather="gift" class="w-4 text-orange-500"></i></span>
                    <span class="ml-1">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</span>
{{--                    <span class="mx-2">|</span>--}}
{{--                    <span>More stuff</span>--}}
                </div>
                    <p class="text-gray-300 mt-8">{{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12">Known for</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}">
                                <img src="{{ $movie['poster_path'] }}" alt="" class="hover:opacity-75 tranition ease-in-out duration-150">
                            </a>
                            <a href="{{ $movie['linkToPage'] }}
                               class="text-sm leading-normal block text-gray-400 hover:text-white mt-1"> {{ $movie['title'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div><!-- movie info ends here -->

    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }} as {{ $credit['character'] }}</strong></li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
