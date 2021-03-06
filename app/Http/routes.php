<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showContent');

Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{movie}', 'MoviesController@show');

Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');

Route::get('contact', 'HomeController@contact');

Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/welcome', 'Admin\OverviewController@welcome');
    Route::get('admin/contact', 'Admin\OverviewController@contact');

    Route::get('admin/events', 'Admin\EventsController@index');
    Route::get('admin/events/create', 'Admin\EventsController@create');
    Route::post('admin/events', 'Admin\EventsController@store');
    Route::get('admin/events/{event}/edit', 'Admin\EventsController@edit');
    Route::patch('admin/events/{event}', 'Admin\EventsController@update');
    Route::delete('admin/events/{event}', 'Admin\EventsController@destroy');

    Route::get('admin/movies', 'Admin\MoviesController@index');
    Route::get('admin/movies/create', 'Admin\MoviesController@create');
    Route::post('admin/movies', 'Admin\MoviesController@store');
    Route::get('admin/movies/{movie}/edit', 'Admin\MoviesController@edit');
    Route::patch('admin/movies/{movie}', 'Admin\MoviesController@update');
    Route::delete('admin/movies/{movie}', 'Admin\MoviesController@destroy');

    Route::get('admin/events/search', 'Admin\EventsController@search');
    Route::get('admin/movies/search', 'Admin\MoviesController@search');

    Route::get('admin/profile/edit', 'Admin\UsersController@edit');
    Route::patch('admin/profile', 'Admin\UsersController@update');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('admin/users', 'Admin\UsersController@index');
    Route::get('admin/users/create', 'Admin\UsersController@create');
    Route::post('admin/users', 'Admin\UsersController@store');
    Route::get('admin/users/{user}/edit', 'Admin\UsersController@edit');
    Route::patch('admin/users/{user}', 'Admin\UsersController@update');
    Route::delete('admin/users/{user}', 'Admin\UsersController@destroy');
});

// API routes

Route::group(['prefix' => 'api/v1'], function() {

    Route::get('movies', 'Admin\MoviesController@index');
    Route::get('movies/{movie}', 'Admin\MoviesController@show');

    Route::get('events', 'Admin\EventsController@index');
    Route::get('events/{event}', 'Admin\EventsController@show');

    Route::get('users', 'Admin\UsersController@index');
    Route::get('users/{user}', 'Admin\UsersController@show');

    Route::group(['middleware' => ['auth.basic']], function() {
        Route::post('movies', 'Admin\MoviesController@store');
        Route::patch('movies/{movie}', 'Admin\MoviesController@update');
        Route::delete('movies/{movie}', 'Admin\MoviesController@destroy');

        Route::post('events', 'Admin\EventsController@store');
        Route::patch('events/{event}', 'Admin\EventsController@update');
        Route::delete('events/{event}', 'Admin\EventsController@destroy');

        Route::post('users', 'Admin\UsersController@store');
        Route::patch('users/{user}', 'Admin\UsersController@update');
        Route::delete('users/{user}', 'Admin\UsersController@destroy');
    });

});


Route::get('events/images/{image}', function($filename) {
    $path = storage_path() . '\app\public\events\\' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('movies/images/{image}', function($filename) {
    $path = storage_path() . '\app\public\movies\\' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('movies/images/highlights/{image}', function($filename) {
    $path = storage_path() . '\app\public\movies\highlights\\' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

