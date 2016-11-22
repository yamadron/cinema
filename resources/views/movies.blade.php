@extends('app')

@section('not_carousel')
    style="position: relative;"
@endsection
@section('content')
    @foreach($movies as $movie)
        <div class="media">
            <div class="media-left">
                <a href="{{ url("/movies/$movie->id") }}">
                    <img class="media-object" src="{{ url('movies/images/' . $movie->poster) }}" alt="" style="width: 200px">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ $movie->name }}</h4>
                {{ $movie->lead }}
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary" type="button">
                    {{ $movie->status }}
                </button>
            </div>
        </div>
    @endforeach
@endsection