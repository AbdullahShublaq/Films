<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ActorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_actors,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_actors,guard:admin'])->only('index');
        $this->middleware(['permission:update_actors,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_actors,guard:admin'])->only('destroy');
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
        $actors = Actor::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
            $query->when($request->film, function ($q) use ($request) {
                return $q->whereHas('films', function ($q2) use ($request) {
                    $q2->whereIn('film_id', (array)$request->film);
                });
            });
        })->latest()->paginate(10);

        return view('dashboard.actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.actors.create');
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
        $attributes = $request->validate([
            'name' => 'required|string|max:30|min:3|unique:actors',
            'dob' => 'required|date',
            'overview' => 'required|string',
            'biography' => 'required|string',
            'avatar' => 'required|image',
            'background_cover' => 'required|image',
        ]);

        $attributes['avatar'] = $request->avatar->store('actor_avatars');
        $attributes['background_cover'] = $request->background_cover->store('actor_background_covers');

        $actor = Actor::create([
            'name' => $attributes['name'],
            'dob' => $attributes['dob'],
            'overview' => $attributes['overview'],
            'biography' => $attributes['biography'],
            'avatar' => $attributes['avatar'],
            'background_cover' => $attributes['background_cover'],
        ]);

        session()->flash('success', 'Actor Added Successfully');
        return redirect()->route('dashboard.actors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        //
        return view('dashboard.actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        //
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:30', 'min:3', Rule::unique('actors')->ignore($actor)],
            'dob' => 'required|date',
            'overview' => 'required|string',
            'biography' => 'required|string',
            'avatar' => 'nullable|image',
            'background_cover' => 'nullable|image',
        ]);

        if ($request->avatar) {
            Storage::delete($actor->getAttributes()['avatar']);
            $attributes['avatar'] = $request->avatar->store('actor_avatars');
        }
        if ($request->background_cover) {
            Storage::delete($actor->getAttributes()['background_cover']);
            $attributes['background_cover'] = $request->background_cover->store('actor_background_covers');
        }

        $actor->update($attributes);

        session()->flash('success', 'Actor Updated Successfully');
        return redirect()->route('dashboard.actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Actor $actor)
    {
        //
        $actor->delete();

        session()->flash('success', 'Actor Deleted Successfully');
        return redirect()->route('dashboard.actors.index');
    }
}
