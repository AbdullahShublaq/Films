<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function store(Film $film, Request $request)
    {
        $attribute = $request->validate([
          'title' => 'required|string|max:20',
          'review' => 'required|string|max:150',
        ]);
        $result = $film->review(auth()->user(), $attribute['title'], $attribute['review']);
        session()->flash('create_review', 'Thank You For Reviewing This Movie');
        return back();
    }

    public function destroy(Film $film)
    {
        $film->deleteReview(auth()->user());
        session()->flash('delete_review', 'Your Review Deleted Successfully');
        return back();
    }
}
