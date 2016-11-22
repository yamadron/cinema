<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class MoviesController extends Controller
{
    public function index() {
        $movies = Movie::all();

        return view('movies', compact('movies', $movies));
    }

    public function show(Movie $movie) {
        return view('movie', compact('movie'));
    }
}
