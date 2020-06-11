<?php

namespace App\Http\Controllers;

use App\Film;

class FavoriteController extends Controller
{
    //
    public function store(Film $film)
    {
        $result = $film->addToFavorite(auth()->user());
        return $result;
    }

    public function destroy(Film $film)
    {
        $result = $film->removeFromFavorite(auth()->user());
        return $result;
    }
}
