<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class RateController extends Controller
{
    //
    public function store(Film $film, Request $request)
    {
        $result = $film->rate(auth()->user(), $request->rating);
        return $result;
    }
}
