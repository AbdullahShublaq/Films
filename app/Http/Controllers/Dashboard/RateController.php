<?php

namespace App\Http\Controllers\Dashboard;

use App\Film;
use App\Http\Controllers\Controller;
use App\Rate;
use App\User;
use Illuminate\Http\Request;

class RateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_ratings,guard:admin'])->only('index');
        $this->middleware(['permission:delete_ratings,guard:admin'])->only('destroy');
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
        $ratings = Rate::with('user')->with('film')
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
                $query->when($request->rate, function ($q) use ($request) {
                    return $q->where('rate', (array)$request->rate);
                });
            })
            ->latest()->paginate(10);
        $clients = User::all();
        $films = Film::all();

        return view('dashboard.ratings.index', compact('ratings', 'clients', 'films'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Rate $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rate = Rate::findOrFail($id);
        $rate->delete();

        session()->flash('success', 'Rate Deleted Successfully');
        return redirect()->route('dashboard.ratings.index');
    }
}
