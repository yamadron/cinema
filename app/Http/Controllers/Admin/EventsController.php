<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Storage;

class EventsController extends Controller
{
    public function index() {
        $events = Event::all()->sortByDesc('publish_date');

        return view('admin.events.index', compact('events'));
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

        $event->update($inputs);

        return back();
    }

    public function destroy(Event $event) {
        $event->delete();

        return redirect('admin/events');
    }
}
