<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return CategoryResource::collection(Category::paginate(10))->additional([
            'status' => 'success',
            'code' => '200',
            'message' => 'Show all categories',
        ]);
    }
}
