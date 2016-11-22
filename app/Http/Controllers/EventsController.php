<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use App\Http\Requests;

class EventsController extends Controller
{
    public function index() {
        $events = Event::all()->sortByDesc('publish_date');

        return view('events', compact('events'));
    }

    public function show(Event $event) {
        return view('event', compact('event'));
    }
}
