<?php

namespace App\Http\Controllers;

use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                              ->get('https://api.themoviedb.org/3/movie/popular')
                              ->json()['results'];

         $genresArray = Http::withToken(config('services.tmdb.token'))
                              ->get('https://api.themoviedb.org/3/genre/movie/list')
                              ->json()['genres'];
        
        $genres = collect( $genresArray)->mapWithKeys(function($genre){
                                return [$genre['id'] => $genre['name']];
                              });

        $Nowplaying = Http::withToken(config('services.tmdb.token'))
                              ->get('https://api.themoviedb.org/3/movie/now_playing')
                              ->json()['results'];
        
        
                        
        return Inertia::render('Welcome',[
            'popularMovies' => collect($popularMovies)->take(10),
            'genres' => $genres,
            'Nowplaying' => collect($Nowplaying)->take(10),
        ]);
    }

    public function ShowMovie($movie)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$movie.'?append_to_response=credits,videos,images')
        ->json();

        
        return Inertia::render('ShowMovie',[
            'movie' => $movie
        ]);
    }

    
}
