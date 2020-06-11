<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index(){
        //
        $films = Film::latest()->paginate(10);

        return view('movies.index', compact('films'));
    }

    public function show(Film $film){
        //
        $reviews = $film->reviews()->latest()->paginate(10);
        return view('movies.show', compact('film', 'reviews'));
    }
}
