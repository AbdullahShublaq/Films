<?php

namespace App\Http\Controllers\Dashboard;

use App\Film;
use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_reviews,guard:admin'])->only('index');
        $this->middleware(['permission:delete_reviews,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $reviews = Review::with('user')->with('film')
            ->where(function ($query) use ($request) {
                $query->when($request->client, function ($q) use ($request) {
                    return $q->whereHas('user', function ($q2) use ($request) {
                        $q2->whereIn('id', (array)$request->client);
                    });
                });
                $query->when($request->film, function ($q) use ($request) {
                    return $q->whereHas('film', function ($q2) use ($request) {
                        $q2->whereIn('id', (array)$request->film);
                    });
                });
            })
            ->latest()->paginate(10);
        $clients = User::all();
        $films = Film::all();

        return view('dashboard.reviews.index', compact('reviews', 'clients', 'films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        //
        $review->delete();

        session()->flash('success', 'Review Deleted Successfully');
        return redirect()->route('dashboard.reviews.index');
    }
}
