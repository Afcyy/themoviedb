<div>
    <div class="mt-8">
        <a href="{{ route('show', $movie['id']) }}">
            <img src="{{ $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-100">
        </a>
        <div class="mt-2">
            <a href="{{ route('show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span><i data-feather="star" class="w-4 fill-current text-orange-500"></i></span>
                <span class="ml-1">{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
            </div>
            <div class="text-gray-400 text-sm">
                {{ $movie['genres'] }}
            </div>
        </div>
    </div>
</div>
