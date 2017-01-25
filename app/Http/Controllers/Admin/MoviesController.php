<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Route;
use Response;

class MoviesController extends Controller {

    function __construct() {

    }

    public function index() {
        $movies = Movie::paginate(15);

        if (Route::getCurrentRoute()->getPrefix() == '/api/v1') {
            return $movies;
        } else {
            return view('admin.movies.index', compact('movies'));
        }
    }

    public function show($movie) {
        $movie = Movie::find($movie);
        if (!$movie) {
            return Response::json([
                'error' => [
                    'message' => "Movie does not exist"
                ]
            ], 404);
        } else {
            return $movie;
        }
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
            'poster' => $request->file('poster')->getClientOriginalName(),
        ];

        Storage::put("public/movies/" . $inputs['poster'], file_get_contents($request->file('poster')->getRealPath()));

        if ($request->file('highlight_image') != null) {
            $inputs['highlight_image'] = $request->file('highlight_image')->getClientOriginalName();
            Storage::put("public/movies/highlights/" . $inputs['highlight_image'], file_get_contents($request->file('highlight_image')->getRealPath()));
        }

        $movie->create($inputs);

        session()->flash('confirm', 'Movie has been <b>added</b>.');

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
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'lead' => $request->input('lead'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ];

        if($request->file('poster') != null) {
            $inputs['poster'] = $request->file('poster')->getClientOriginalName();
            Storage::put("public/movies/" . $inputs['poster'], file_get_contents($request->file('poster')->getRealPath()));
        }

        if ($request->file('highlight_image') != null) {
            $inputs['highlight_image'] = $request->file('highlight_image')->getClientOriginalName();
            Storage::put("public/movies/highlights/" . $inputs['highlight_image'], file_get_contents($request->file('highlight_image')->getRealPath()));
        }

        $movie->update($inputs);

        session()->flash('confirm', 'Movie has been <b>updated</b>.');

        return back();
    }

    public function destroy(Movie $movie) {
        $movie->delete();

        session()->flash('confirm-delete', 'Movie has been <b>deleted</b>.');

        return back();
    }

    public function search(Request $request) {
        $word = $request->input('s');
        $movies = Movie::search($word)->paginate(15);

        return view('admin.movies.index', compact('movies'));
    }
}
