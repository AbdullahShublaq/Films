<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Category;
use App\Film;
use App\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliderFilms = Film::with('categories')->with('ratings')->limit(10)->latest()->get();
        $categoryFilms = Category::with('films')->get();

        return view('home', compact('sliderFilms', 'categoryFilms'));
    }

    public function search(Request $request)
    {
        switch ($request->search_category) {
            case 'movies':
                $films = Film::where('name', 'like', '%' . $request->search . '%')->paginate(10);
                return view('movies.index', compact('films'));
                break;
            case 'actors':
                $actors = Actor::where('name', 'like', '%' . $request->search . '%')->paginate(10);
                return view('actors.index', compact('actors'));
                break;
            default:
                return redirect()->back();
        }
    }

    public function message(Request $request){
        $attributes = $request->validate([
            'email' =>  'required|email',
            'title'=>  'required|string',
            'message'=>  'required|string|max:250'
        ]);

        Message::create([
           'email' => $attributes['email'],
           'title' => $attributes['title'],
           'message' => $attributes['message'],
        ]);

        session()->flash('success', 'Thank you for contact us');
        return redirect()->back();

    }
}
