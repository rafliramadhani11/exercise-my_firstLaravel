<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "namaHalaman" => "Welcome to my Landing Page"
        ]);
    }
}
