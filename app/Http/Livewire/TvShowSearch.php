<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TvShowSearch extends Component
{
    public $search = '';

    public function render()
    {

        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/tv?query=' . $this->search)
                ->json()['results'];
        }


        return view('livewire.tv-show-search', [
            "searchResults" => collect($searchResults)->take(7),
        ]);
    }
}
