<?php

namespace App\Http\Controllers\Api;

use App\Actor;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActorShowResource;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    //
    public function show(Actor $actor)
    {
        return (new ActorShowResource($actor))->additional([
            'status' => 'success',
            'code' => '200',
            'message' => 'Show one movie',
        ]);;
    }
}
