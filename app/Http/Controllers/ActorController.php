<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    //
    public function index(){
        //
        $actors = Actor::latest()->paginate(10);

        return view('actors.index', compact('actors'));
    }

    public function show(Actor $actor){
        //
        return view('actors.show', compact('actor'));
    }
}
