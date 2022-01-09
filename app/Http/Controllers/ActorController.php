<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function index()
    {
        $popularActors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular')
        ->json()['results'];

        

        return Inertia::render('Actors',[
'popularActors' => $popularActors
        ]);
    }

    public function showActor($actor)
    {
        $actors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$actor)
        ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$actor.'/combined_credits')
        ->json();

        

        
        // dump($credits);
        return Inertia::render('ShowActor',[
            'actors' => $actors,
            'credits' => $credits,
                    ]);
    }
}
