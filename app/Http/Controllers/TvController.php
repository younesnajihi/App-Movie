<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index()
    {
        $tvpopulars = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular')
        ->json()['results'];
        
        $tvTopReated = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
                              ->get('https://api.themoviedb.org/3/genre/tv/list')
                              ->json()['genres'];
        
                              $genres = collect( $genresArray)->mapWithKeys(function($genre){
                                return [$genre['id'] => $genre['name']];
                              });


        return Inertia::render('Tv',[
            'tvpopulars' => $tvpopulars,
            'tvTopReated' => $tvTopReated,
            'genres' => $genres

        ]);
    }

    public function showTv($tv)
    {
        $tv = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$tv.'?append_to_response=credits,videos,images')
        ->json();

        return Inertia::render('ShowTv',[
            'tv' => $tv,
            
        ]);

    }
}
