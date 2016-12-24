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

    public function show($id) {
        $movie = Movie::find($id);
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
            'highlight_image' => $request->file('highlight_image')
        ];

        Storage::put("public/movies/" . $inputs['poster'], file_get_contents($request->file('poster')->getRealPath()));
        if ($inputs['highlight_image'] != null) {
            $inputs['highlight_image'] = $request->file('highlight_image')->getClientOriginalName();
            Storage::put("public/movies/highlights/" . $inputs['highlight_image'], file_get_contents($request->file('highlight_image')->getRealPath()));
        } else {
            $inputs['highlight_image'] = '';
        }
        $movie->create($inputs);

        return redirect('admin/movies');
    }

    public function edit(Movie $movie) {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movies) {

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

        $movies->update($inputs);

        return back();
    }

    public function destroy(Movie $movies) {
        $movies->delete();

        return redirect('admin/movies');
    }
}
