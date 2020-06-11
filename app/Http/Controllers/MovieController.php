<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index(Request $request){
        //
        $films = Film::where(function ($query) use ($request) {
            $query->when($request->category, function ($q) use ($request) {
                return $q->whereHas('categories', function ($q2) use ($request){
                    return $q2->whereIn('name', (array)$request->category);
                });
            });
        })->latest()->paginate(10);

        return view('movies.index', compact('films'));
    }

    public function show(Film $film){
        //
        $reviews = $film->reviews()->latest()->paginate(10);
        return view('movies.show', compact('film', 'reviews'));
    }
}
