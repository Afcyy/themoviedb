<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ActorsSearchDropdown extends Component
{
    public $search = '';

    public function render()
    {

        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/person?query=' . $this->search)
                ->json()['results'];
        }


        return view('livewire.actors-search-dropdown', [
            "searchResults" => collect($searchResults)->take(7),
        ]);
    }
}
