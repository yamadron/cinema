<?php

namespace App\Http\Controllers\Admin;

use App\Movie;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class OverviewController extends Controller {

    public function welcome() {
        $movies = Movie::take(3)->get();
        $events = Event::all()->sortByDesc('publish_date')->take(4);

        return view('admin.welcome', compact('movies', 'events'));
    }

    public function contact() {
        return view('admin.contact');
    }
}
