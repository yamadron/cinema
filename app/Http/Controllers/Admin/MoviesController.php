<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class MoviesController extends Controller
{
    public function index() {
        $movies = Movie::all();

        return view('admin.movies.index', compact('movies'));
    }

    public function create() {
        return view('admin.movies.create');
    }

    public function store(Request $request, Movie $movie) {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'status' => 'required',
            'poster' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'lead' => $request->input('lead'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'poster' => $request->file('poster')->getClientOriginalName()
        ];

        Storage::put("public/movies/" . $inputs['poster'], file_get_contents($request->file('poster')->getRealPath()));

        $movie->create($inputs);

        return redirect('admin/movies');
    }

    public function edit(Movie $movie) {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie) {

        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'status' => 'required',
            'poster' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'lead' => $request->input('lead'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'poster' => $request->file('poster')->getClientOriginalName()
        ];

        Storage::put("public/movies/" . $inputs['poster'], file_get_contents($request->file('poster')->getRealPath()));

        $movie->update($inputs);

        return back();
    }

    public function destroy(Event $event) {
        $event->delete();

        return redirect('admin/events');
    }
}