<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Storage;
use Route;
use Response;

class EventsController extends Controller
{
    public function index() {
        $events = Event::orderBy('publish_date', 'desc')->paginate(15);

        if (Route::getCurrentRoute()->getPrefix() == '/api/v1') {
            return $events;
        } else {
            return view('admin.events.index', compact('events'));
        }

        return view('admin.events.index', compact('events'));
    }

    public function show($event) {
        $event = Event::find($event);
        if (!$event) {
            return Response::json([
                'error' => [
                    'message' => "Event does not exist"
                ]
            ], 404);
        } else {
            return $event;
        }
    }

    public function create() {
        return view('admin.events.create');
    }

    public function store(Request $request, Event $event) {
        $this->validate($request, [
            'headline' => 'required',
            'publish_date' => 'required',
            'lead' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        $inputs = [
            'headline' => $request->input('headline'),
            'publish_date' => $request->input('publish_date'),
            'lead' => $request->input('lead'),
            'body' => $request->input('body'),
            'image' => $request->file('image')->getClientOriginalName()
        ];

        Storage::put("public/events/" . $inputs['image'], file_get_contents($request->file('image')->getRealPath()));

        $event->create($inputs);

        session()->flash('confirm', 'Event has been <b>added</b>.');

        return redirect('admin/events');
    }

    public function edit(Event $event) {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event) {

        $this->validate($request, [
            'headline' => 'required',
            'publish_date' => 'required',
            'lead' => 'required',
            'body' => 'required',
        ]);

        $inputs = [
            'headline' => $request->input('headline'),
            'publish_date' => $request->input('publish_date'),
            'lead' => $request->input('lead'),
            'body' => $request->input('body')
        ];

        if($request->file('image') != null) {
            $inputs['image'] = $request->file('image')->getClientOriginalName();
            Storage::put("public/events/" . $inputs['image'], file_get_contents($request->file('image')->getRealPath()));
        }

        $event->update($inputs);

        session()->flash('confirm', 'Event has been <b>updated</b>.');

        return back();
    }

    public function destroy(Event $event) {
        $event->delete();

        session()->flash('confirm-delete', 'Event has been <b>deleted</b>.');

        return back();
    }

    public function search(Request $request) {
        $word = $request->input('s');
        $events = Event::search($word)->paginate(15);

        return view('admin.events.index', compact('events'));
    }
}
