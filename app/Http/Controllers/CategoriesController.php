<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Post Cathegories',
            'categories' => Category::all()
        ]);
    }
}
