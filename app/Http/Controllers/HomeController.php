<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Event;

use App\Http\Requests;

class HomeController extends Controller
{
    public function showContent() {
        $movies = Movie::take(3)->get();
        $events = Event::all()->sortByDesc('publish_date')->take(4);

        return view('home', compact('movies', 'events'));
    }

    public function contact() {
        return view('contact');
    }
}
